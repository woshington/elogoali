<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.1.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Bake\Shell\Task;

use Cake\Console\Shell;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

/**
 * The Plugin Task handles creating an empty plugin, ready to be used
 *
 */
class PluginTask extends BakeTask {

/**
 * Path to the bootstrap file. Changed in tests.
 *
 * @var string
 */
	public $bootstrap = null;

/**
 * Tasks this task uses.
 *
 * @var array
 */
	public $tasks = [
		'Bake.Project',
		'Bake.Template'
	];

/**
 * initialize
 *
 * @return void
 */
	public function initialize() {
		$this->path = current(App::path('Plugin'));
		$this->bootstrap = ROOT . DS . 'config' . DS . 'bootstrap.php';
	}

/**
 * Execution method always used for tasks
 *
 * @param string|null $name The name of the plugin to bake.
 * @return void
 */
	public function main($name = null) {
		if (empty($name)) {
			$this->err('<error>You must provide a plugin name in CamelCase format.</error>');
			$this->err('To make an "Example" plugin, run <info>`cake bake plugin Example`</info>.');
			return false;
		}
		$plugin = $this->_camelize($name);
		$pluginPath = $this->_pluginPath($plugin);
		if (is_dir($pluginPath)) {
			$this->out(sprintf('Plugin: %s already exists, no action taken', $plugin));
			$this->out(sprintf('Path: %s', $pluginPath));
			return false;
		}
		if (!$this->bake($plugin)) {
			$this->error(sprintf("An error occurred trying to bake: %s in %s", $plugin, $this->path . $plugin));
		}
	}

/**
 * Bake the plugin's contents
 *
 * Also update the autoloader and the root composer.json file if it can be found
 *
 * @param string $plugin Name of the plugin in CamelCased format
 * @return bool
 */
	public function bake($plugin) {
		$pathOptions = App::path('Plugin');
		if (count($pathOptions) > 1) {
			$this->findPath($pathOptions);
		}
		$this->out(sprintf("<info>Plugin Name:</info> %s", $plugin));
		$this->out(sprintf("<info>Plugin Directory:</info> %s", $this->path . $plugin));
		$this->hr();

		$classBase = 'src';

		$looksGood = $this->in('Look okay?', ['y', 'n', 'q'], 'y');

		if (strtolower($looksGood) !== 'y') {
			return;
		}

		$this->_generateFiles($plugin, $this->path);

		$hasAutoloader = $this->_modifyAutoloader($plugin, $this->path);
		$this->_modifyBootstrap($plugin, $hasAutoloader);

		$this->hr();
		$this->out(sprintf('<success>Created:</success> %s in %s', $plugin, $this->path . $plugin), 2);

		return true;
	}

/**
 * Update the app's bootstrap.php file.
 *
 * @param string $plugin Name of plugin
 * @param bool $hasAutoloader Whether or not there is an autoloader configured for
 * the plugin
 * @return void
 */
	protected function _modifyBootstrap($plugin, $hasAutoloader) {
		$bootstrap = new File($this->bootstrap, false);
		$contents = $bootstrap->read();
		if (!preg_match("@\n\s*Plugin::loadAll@", $contents)) {
			$autoload = $hasAutoloader ? null : "'autoload' => true, ";
			$bootstrap->append(sprintf(
				"\nPlugin::load('%s', [%s'bootstrap' => false, 'routes' => true]);\n",
				$plugin,
				$autoload
			));
			$this->out('');
			$this->out(sprintf('%s modified', $this->bootstrap));
		}
	}

/**
 * Generate all files for a plugin
 *
 * Find the first path which contains `src/Template/Bake/Plugin` that contains
 * something, and use that as the template to recursively render a plugin's
 * contents. Allows the creation of a bake them containing a `Plugin` folder
 * to provide customized bake output for plugins.
 *
 * @param string $pluginName the CamelCase name of the plugin
 * @param string $path the path to the plugins dir (the containing folder)
 * @return void
 */
	protected function _generateFiles($pluginName, $path) {
		$this->Template->set([
			'plugin' => $pluginName,
			'path' => $path,
			'root' => ROOT
		]);

		$root = $path . $pluginName . DS;

		$paths = [];
		if (!empty($this->params['theme'])) {
			$paths[] = Plugin::path($this->params['theme']) . 'src/Template/';
		}

		$paths = array_merge($paths, Configure::read('App.paths.templates'));
		$paths[] = Plugin::path('Bake') . 'src/Template/';

		do {
			$templatesPath = array_shift($paths) . 'Bake/Plugin';
			$templatesDir = new Folder($templatesPath);
			$templates = $templatesDir->findRecursive('.*\.ctp');
		} while (!$templates);

		sort($templates);
		foreach ($templates as $template) {
			$template = substr($template, strrpos($template, 'Plugin') + 7, -4);
			$this->_generateFile($template, $root);
		}
	}

/**
 * Generate a file
 *
 * @param string $template The template to render
 * @param string $root The path to the plugin's root
 * @return void
 */
	protected function _generateFile($template, $root) {
		$this->out(sprintf('Generating %s file...', $template));
		$out = $this->Template->generate('Plugin/' . $template);
		$this->createFile($root . $template, $out);
	}

/**
 * Modifies App's composer.json to include the plugin and tries to call
 * composer dump-autoload to refresh the autoloader cache
 *
 * @param string $plugin Name of plugin
 * @param string $path The path to save the phpunit.xml file to.
 * @return bool True if composer could be modified correctly
 */
	protected function _modifyAutoloader($plugin, $path) {
		$file = $this->_rootComposerFilePath();

		if (!file_exists($file)) {
			$this->out(sprintf('<info>Main composer file %s not found</info>', $file));
			return false;
		}

		$config = json_decode(file_get_contents($file), true);
		$config['autoload']['psr-4'][$plugin . '\\'] = "./plugins/$plugin/src";
		$config['autoload-dev']['psr-4'][$plugin . '\\Test\\'] = "./plugins/$plugin/tests";

		$this->out('<info>Modifying composer autoloader</info>');

		$out = json_encode($config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
		$this->createFile($file, $out);

		$composer = $this->Project->findComposer();

		if (!$composer) {
			$this->error('Could not locate composer, Add composer to your PATH, or use the -composer option.');
			return false;
		}

		try {
			$cwd = getcwd();

			// Windows makes running multiple commands at once hard.
			chdir(dirname($path));
			$command = 'php ' . escapeshellarg($composer) . ' dump-autoload';
			$this->callProcess($command);

			chdir($cwd);
		} catch (\RuntimeException $e) {
			$error = $e->getMessage();
			$this->error(sprintf('Could not run `composer dump-autoload`: %s', $error));
			return false;
		}

		return true;
	}

/**
 * The path to the main application's composer file
 *
 * This is a test issolation wrapper
 *
 * @return string the abs file path
 */
	protected function _rootComposerFilePath() {
		return ROOT . DS . 'composer.json';
	}

/**
 * find and change $this->path to the user selection
 *
 * @param array $pathOptions The list of paths to look in.
 * @return void
 */
	public function findPath(array $pathOptions) {
		$valid = false;
		foreach ($pathOptions as $i => $path) {
			if (!is_dir($path)) {
				unset($pathOptions[$i]);
			}
		}
		$pathOptions = array_values($pathOptions);

		$max = count($pathOptions);
		while (!$valid) {
			foreach ($pathOptions as $i => $option) {
				$this->out($i + 1 . '. ' . $option);
			}
			$prompt = 'Choose a plugin path from the paths above.';
			$choice = $this->in($prompt, null, 1);
			if ((int)$choice > 0 && (int)$choice <= $max) {
				$valid = true;
			}
		}
		$this->path = $pathOptions[$choice - 1];
	}

/**
 * Gets the option parser instance and configures it.
 *
 * @return \Cake\Console\ConsoleOptionParser
 */
	public function getOptionParser() {
		$parser = parent::getOptionParser();
		$parser->description(
			'Create the directory structure, AppController class and testing setup for a new plugin. ' .
			'Can create plugins in any of your bootstrapped plugin paths.'
		)->addArgument('name', [
			'help' => 'CamelCased name of the plugin to create.'
		])->addOption('composer', [
			'default' => ROOT . DS . 'composer.phar',
			'help' => 'The path to the composer executable.'
		])->removeOption('plugin');

		return $parser;
	}

}
