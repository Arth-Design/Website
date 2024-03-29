<?php
/*
   Class: RatioEdgeFramework
   A class that initializes Edge Framework
*/
class RatioEdgeFramework {

    private static $instance;
    public $edgtOptions;
    public $edgtMetaBoxes;
    private $skin;

    private function __construct() {
        $this->edgtOptions = RatioEdgeOptions::get_instance();
        $this->edgtMetaBoxes = RatioEdgeMetaBoxes::get_instance();
    }
    
    public static function get_instance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    public function getSkin() {
        return $this->skin;
    }

	public function setSkin(RatioEdgeSkinAbstract $skinObject) {
		$this->skin = $skinObject;
	}
}

/**
 * Class RatioEdgeSkinManager
 *
 * Class that used like a factory for skins.
 * It loads required skin file and instantiates skin class
 */
class RatioEdgeSkinManager {
    /**
     * @var this will be an instance of skin
     */
    private $skin;

    /**
     * @see EdgeSkinManager::setSkin()
     */
    public function __construct() {
        $this->setSkin();
    }

    /**
     * Loads wanted skin, instantiates skin class and stores it in $skin attribute
     * @param string $skinName skin to load. Must match skin folder name
     */
    private function setSkin($skinName = 'edge') {
        if($skinName !== '') {
            if(file_exists(EDGE_ROOT_DIR.'/framework/admin/skins/'.$skinName.'/skin.php')) {
                require_once EDGE_ROOT_DIR.'/framework/admin/skins/'.$skinName.'/skin.php';

                $skinName = ucfirst($skinName).'Skin'; // Skin label is part of the class name so can't be translatable

                $this->skin = new $skinName();
            }
        } else {
            $this->skin = false;
        }
    }

    /**
     * Returns current skin object. It $skin attribute isn't set it calls setSkin method
     *
     * @return mixed
     *
     * @see EdgeSkinManager::setSkin()
     */
    public function getSkin() {
        if(empty($this->skin)) {
            $this->setSkin();
        }

        return $this->skin;
    }
}

/**
 * Class RatioEdgeSkinAbstract
 *
 * Abstract class that each skin class must extend
 */
abstract class RatioEdgeSkinAbstract {
    /**
     * @var string
     */
    protected $skinName;
    /**
     * @var array of styles that skin will be including
     */
    protected $styles;
    /**
     * @var array of scripts that skin will be including
     */
    protected $scripts;
    /**
     * @var array of icons names for each menu item that theme is adding
     */
    protected $icons;
    /**
     * @var array of menu items positions of each menu item that theme is adding
     */
    protected $itemPosition;

    /**
     * Returns skin name attribute whenever skin is used in concatenation
     * @return mixed
     */
    public function __toString() {
		return $this->skinName;
	}

    /**
     * @return mixed
     */
    public function getSkinName() {
		return $this->skinName;
	}

    /**
     * Loads template part with params. Uses locate_template function which is child theme friendly
     * @param $template string template to load
     * @param array $params parameters to pass to template
     */
    public function loadTemplatePart($template, $params = array()) {
        if(is_array($params) && count($params)) {
            extract($params);
        }

        if($template !== '') {
            include(ratio_edge_find_template_path('framework/admin/skins/'.$this->skinName.'/templates/'.$template.'.php'));
        }
    }

    /**
     * Goes through each added scripts and enqueus it
     */
    public function enqueueScripts() {
        if(is_array($this->scripts) && count($this->scripts)) {
            foreach ($this->scripts as $scriptHandle => $scriptPath) {
                wp_enqueue_script($scriptHandle);
            }
        }
    }

    /**
     * Goes through each added styles and enqueus it
     */
    public function enqueueStyles() {
        if(is_array($this->styles) && count($this->styles)) {
            foreach ($this->styles as $styleHandle => $stylePath) {
                wp_enqueue_style($styleHandle);
            }
        }
    }

    /**
     * Returns menu item icon based on first param
     * @param $icon
     * @return string
     */
    public function getMenuIcon($icon) {
		if($icon !== '' && array_key_exists($icon, $this->icons)) {
			return $this->icons[$icon];
		}

		return EDGE_ASSETS_ROOT.'/img/admin-logo.png';
	}

    /**
     * Returns item position for menu item
     * @param $itemPosition
     * @return int
     */
    public function getMenuItemPosition($itemPosition) {
		if($itemPosition !== '' && array_key_exists($itemPosition, $this->itemPosition)) {
			return $this->itemPosition[$itemPosition];
		}

		return 4;
	}

    /**
     * Echoes script tag that generates global variable that will be used in TinyMCE
     */
    public function setShortcodeJSParams() { ?>
		<script>
			window.edgtSCIcon = '<?php echo ratio_edge_get_skin_uri().'/assets/img/admin-logo-icon.png'; ?>';
			window.edgtSCLabel = '<?php echo esc_html(ucfirst($this->skinName)); ?> Shortcodes';
		</script>
	<?php }

    /**
     * Formates skin name so it can be used in concatenation
     * @return string
     */
    public function getSkinLabel() {
		return ucfirst($this->skinName);
	}

    /**
     * Returns URI to skin folder
     * @return string
     */
    public function getSkinURI() {
        return EDGE_ROOT.'/framework/admin/skins/'.$this->skinName;
    }

    /**
     * Here options page content will be generated
     * @return mixed
     */
    public abstract function renderOptions();

    /**
     * Here import page will be generated
     * @return mixed
     */
    public abstract function renderImport();

    /**
     * Here all scripts will be registered
     * @return mixed
     */
    public abstract function registerScripts();

    /**
     * Here all styles will be registered
     * @return mixed
     */
    public abstract function registerStyles();

    /**
     * Here all icons will be set
     * @return mixed
     */
    public abstract function setIcons();
}



/*
   Class: RatioEdgeOptions
   A class that initializes Edge Options
*/
class RatioEdgeOptions {

    private static $instance;
    public $adminPages;
    public $options;
    public $optionsByType;

    private function __construct() {
        $this->adminPages = array();
        $this->options = array();
        $this->optionsByType = array();
    }
    
		public static function get_instance() {
		
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
		
			return self::$instance;
		
		}

    public function addAdminPage($key, $page) {
        $this->adminPages[$key] = $page;
    }

    public function getAdminPage($key) {
        return $this->adminPages[$key];
    }

    public function adminPageExists($key) {
        return array_key_exists($key, $this->adminPages);
    }

    public function getAdminPageFromSlug($slug) {
			foreach ($this->adminPages as $key=>$page ) {
				if ($page->slug == $slug)
					return $page;
			}
      return;
    }

    public function addOption($key, $value, $type = '') {
        $this->options[$key] = $value;

        $this->addOptionByType($type, $key);

    }

    public function getOption($key) {
        if(isset($this->options[$key])) {
            return $this->options[$key];
        }

        return;
    }

    public function addOptionByType($type, $key) {
        $this->optionsByType[$type][] = $key;
    }

    public function getOptionsByType($type) {
        if(array_key_exists($type, $this->optionsByType)) {
            return $this->optionsByType[$type];
        }

        return false;
    }

    public function getOptionValue($key) {
        global $ratio_edge_options;

        if(array_key_exists($key, $ratio_edge_options)) {
            return $ratio_edge_options[$key];
        } elseif(array_key_exists($key, $this->options)) {
            return $this->getOption($key);
        }

        return false;
    }
}

/*
   Class: RatioEdgeAdminPage
   A class that initializes Edge Admin Page
*/
class RatioEdgeAdminPage implements iRatioEdgeLayoutNode {

    public $layout;
    private $factory;
    public $slug;
    public $title;
    public $icon;

    function __construct($slug="", $title_label="", $icon = "") {
        $this->layout = array();
        $this->factory = new RatioEdgeFieldFactory();
        $this->slug = $slug;
        $this->title = $title_label;
        $this->icon = $icon;
    }

    public function hasChidren() {
        return (count($this->layout) > 0)?true:false;
    }

    public function getChild($key) {
        return $this->layout[$key];
    }

    public function addChild($key, $value) {
        $this->layout[$key] = $value;
    }

    function render() {
        foreach ($this->layout as $child) {
            $this->renderChild($child);
        }
    }

    public function renderChild(iRatioEdgeRender $child) {
        $child->render($this->factory);
    }
}

/*
   Class: RatioEdgeMetaBoxes
   A class that initializes Edge Meta Boxes
*/
class RatioEdgeMetaBoxes {

    private static $instance;
    public $metaBoxes;
    public $options;

    private function __construct() {
        $this->metaBoxes = array();
        $this->options = array();
    }
    
    public static function get_instance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    public function addMetaBox($key, $box) {
        $this->metaBoxes[$key] = $box;
    }

    public function getMetaBox($key) {
        return $this->metaBoxes[$key];
    }

    public function addOption($key, $value) {
        $this->options[$key] = $value;
    }

    public function getOption($key) {
        if(isset($this->options[$key])) {
            return $this->options[$key];
        }
        return;
    }

    public function getMetaBoxesByScope($scope) {
        $boxes = array();

        if(is_array($this->metaBoxes) && count($this->metaBoxes)) {
            foreach($this->metaBoxes as $metabox) {
                if(is_array($metabox->scope) && in_array($scope, $metabox->scope)) {
                    $boxes[] = $metabox;
                } elseif($metabox->scope !== '' && $metabox->scope === $scope) {
                    $boxes[] = $metabox;
                }
            }
        }

        return $boxes;
    }

}

/*
   Class: RatioEdgeMetaBox
   A class that initializes Edge Meta Box
*/
class RatioEdgeMetaBox implements iRatioEdgeLayoutNode {

    public $layout;
	private $factory;
	public $scope;
	public $title;
	public $hidden_property;
	public $hidden_values = array();
    public $name;
	public $context = '';
	public $priority = '';

    function __construct($scope="", $title_label="",$hidden_property="", $hidden_values = array(), $name = '', $context='advanced', $priority = 'high') {
        $this->layout = array();
		$this->factory = new RatioEdgeFieldFactory();
		$this->scope = $scope;
		$this->title = $this->setTitle($title_label);
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
        $this->name = $name;
		$this->context = $context;
		$this->priority = $priority;
    }

    public function hasChidren() {
        return (count($this->layout) > 0)?true:false;
    }

    public function getChild($key) {
        return $this->layout[$key];
    }

    public function addChild($key, $value) {
        $this->layout[$key] = $value;
    }

    function render() {
        foreach ($this->layout as $child) {
            $this->renderChild($child);
        }
    }

    public function renderChild(iRatioEdgeRender $child) {
        $child->render($this->factory);
    }

	public function setTitle($label) {
		global $ratio_edge_Framework;

		return $ratio_edge_Framework->getSkin()->getSkinLabel().' '.$label;
 	}
}

if ( ! function_exists( 'ratio_edge_init_framework_variable' ) ) {

	function ratio_edge_init_framework_variable() {

		global $ratio_edge_Framework;

		$ratio_edge_Framework = RatioEdgeFramework::get_instance();
		$edgtSkinManager = new RatioEdgeSkinManager();
		$ratio_edge_Framework->setSkin($edgtSkinManager->getSkin());
	}

	add_action('ratio_edge_before_options_map', 'ratio_edge_init_framework_variable' );
}
?>