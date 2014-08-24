<?php



class Project extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'projects';
        protected $perPage = 2;

        protected $fillable = ['id', 'name', 'short_description_es', 'short_description_en', 'description_es', 'description_en', 'about_es', 'about_en', 'structure_es', 'structure_en', 'objectives_es', 'objectives_en', 'lines_of_work_es', 'lines_of_work_en', 'resources_es', 'resources_en', 'base_address', 'addresses', 'contact', 'email', 'geo_coordinates', 'image_or_logo', 'selfmanaged', 'vegan', 'released', 'revised'];        
        
        
            public $errors;
    
            public function isValid($data, $id = 0){
                
                $rules = array(
                    'name'     => array('required', 'unique:projects,name' . ($id ? ",$id" : '')),
                    'email'    => array('email'),
                    'image_or_logo'    => 'mimes:jpeg,bmp,png',
                    'revised' => array('date')
                );

                $validator = Validator::make($data, $rules);

                if ($validator->passes())
                {
                    return true;
                }

                $this->errors = $validator->errors();

                return false;
            }
            public function isValidPhoto($data){
                
                $rules = array(
                    'image_or_logo'    => array('required', 'mimes:jpeg,bmp,png')
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
