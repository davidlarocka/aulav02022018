<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function __construct(){
		$tipo_usuario = 'alumno';
        $id_usuario = Auth::id();
        $profesor = DB::table('profesor')->where('id_usuario','=',$id_usuario);
        if (! is_null($tipo_usuario)) {
            # code...
            $tipo_usuario = 'profesor';
        }
	    // Sharing is caring
	    View::share('tipo_usuario', $tipo_usuario);
	}

}
