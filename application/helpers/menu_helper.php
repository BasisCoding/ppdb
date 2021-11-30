<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('menu_helper')) {
	function fetch_menu($data){
		
		$show = '';
		$menu1 = "";
		$anchor = '';

		foreach($data as $mn => $menu){

			if (!empty($menu->sub)) {
				
				$anchor = '<li data-name="'. $menu->menu_link .'" data-type="">
			        			<a href="'.base_url($menu->menu_link).'">
				        			<i class="'.$menu->menu_icon.'"></i> 
				        			<span class="nav-label">'.$menu->menu_name.'</span> 
				        			<span class="fa arrow"></span>
				        		</a>';

			}else{
				$anchor = '<li data-name="'. $menu->menu_link .'" data-type="">
								<a href="'.base_url($menu->menu_link).'">
									<i class="'.$menu->menu_icon.'"></i> 
									<span class="nav-label">'.$menu->menu_name.'</span>
								</a>';
			}

			$menu1 .= $anchor;

			if(!empty($menu->sub)){

				$menu1 .= '<ul class="nav nav-second-level collapse">';

				$menu1 .= fetch_sub_menu($menu->sub);

				$menu1 .= '</ul>';
			}
			$menu1 .= '</li>';
		}
		return $menu1;
	}

	function fetch_sub_menu($sub_menu){
	
		$sub = "";

		foreach($sub_menu as $menu){
			
			$anchor = '<li data-name="'. $menu->menu_link .'" data-type="sub">
						<a href="'.$menu->menu_link.'">'.$menu->menu_name.'</a>
					</li>';
			$sub .= $anchor;
		}
		return $sub;
	}

}
?>