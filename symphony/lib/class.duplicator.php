<?php

	class Duplicator {
		protected $duplicator;
		protected $instances;
		protected $page;
		protected $tabs;
		protected $templates;
		
		public function __construct($add, $orderable = true) {
			$this->child_name = $child_name;
			$this->page = Symphony::Parent()->Page;
			
			$this->duplicator = $this->page->createElement('div');
			$this->duplicator->setAttribute('class', 'duplicator-widget');
			
			$controls = $this->page->createElement('div');
			$controls->setAttribute('class', 'controls');
			$this->duplicator->appendChild($controls);
			
			$add_item = $this->page->createElement('a', $add);
			$add_item->setAttribute('class', 'add');
			$controls->appendChild($add_item);
			
			$this->templates = $this->page->createElement('ol');
			$this->templates->setAttribute('class', 'templates');
			$this->duplicator->appendChild($this->templates);
			
			$content = $this->page->createElement('div');
			$content->setAttribute('class', 'content');
			$this->duplicator->appendChild($content);
			
			$this->tabs = $this->page->createElement('ol');
			$this->tabs->setAttribute('class', 'tabs');
			$content->appendChild($this->tabs);
			
			if ($orderable) {
				$this->tabs->addClass('orderable-widget');
			}
			
			$this->instances = $this->page->createElement('ol');
			$this->instances->setAttribute('class', 'instances');
			$content->appendChild($this->instances);
		}
		
		public function __call($name, $params) {
			return call_user_method_array($name, $this->duplicator, $params);
		}
		
		public function __get($name) {
			return $this->duplicator->$name;
		}
		
		public function __set($name, $value) {
			return $this->duplicator->$name = $value;
		}
		
		public function createTemplate() {
			$template = $this->page->createElement('li');
			$template->setAttribute('class', 'templates');
			$this->templates->appendChild($template);
			
			return $template;
		}
		
		public function createTab() {
			$template = $this->page->createElement('ol');
			$template->setAttribute('class', 'templates');
			$this->templates->appendChild($template);
			
			return $template;
		}
		
		public function createInstance() {
			$template = $this->page->createElement('ol');
			$template->setAttribute('class', 'templates');
			$this->templates->appendChild($template);
			
			return $template;
		}
		
		public function appendTo(SymphonyDOMElement $wrapper) {
			$wrapper->appendChild($this->duplicator);
		}
	}