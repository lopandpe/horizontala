<?php



class Project extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';


        protected $fillable = ['id', 'name', 'short_description_es', 'short_description_en', 'description_es', 'description_en', 'resources_es', 'resources_en', 'base_address', 'addresses', 'contact', 'email', 'geo_coordinates', 'image_or_logo', 'selfmanaged', 'vegan', 'released'];        
        
        
            public $errors;
    
            public function isValid($data){
                
                $rules = array(
                    'name'     => array('required', 'unique:projects'),
                    'email'    => array('email'),
                    'image_or_logo'    => 'mimes:jpeg,bmp,png'
                );

                $validator = Validator::make($data, $rules);

                if ($validator->passes())
                {
                    return true;
                }

                $this->errors = $validator->errors();

                return false;
            }
}
