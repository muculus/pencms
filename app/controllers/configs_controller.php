<?php
class ConfigsController extends AppController {
	var $name = 'Configs';
	
	function index() {
		if (!empty($this->data)) {
			configure::write('meta.description',  $this->data['meta']['description']);
			configure::write('meta.title',  $this->data['meta']['title']);
			configure::write('meta.owner',  $this->data['meta']['owner']);
			configure::write('meta.description',  $this->data['meta']['description']);
			configure::write('Cash.time',  $this->data['Cash']['time']);
			configure::write('Cash.setting',  $this->data['Cash']['setting']);
			configure::write('Cash.time',  $this->data['Cash']['time']);
			configure::write('session.lifetime',  $this->data['Session']['lifetime']);
			configure::write('time.offset',  $this->data['time']['offset']);
			configure::write('Database.type',  $this->data['Database']['type']);
			configure::write('Database.server',  $this->data['Database']['server']);
			configure::write('Database.username',  $this->data['Database']['username']);
			configure::write('Database.password',  $this->data['Database']['password']);
		}
	}
}
?>