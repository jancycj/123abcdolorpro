(function() {
	
	window.local = window.local || {};
	window.local.version = 0.1;
	window.local.author = 'Bastin Robins .J <bastinrobins@gmail.com>';


	/**
	 * Determines if object.
	 *
	 * @param      {<type>}   v       { parameter_description }
	 * @return     {boolean}  True if object, False otherwise.
	 */
	local.is_object = function(v) {

		return typeof(v)==='object' ? true : false;
	}

	/**
	 * Check Empty
	 *
	 * @param      {<type>}  q_name  The quarter name
	 * @return     {<type>}  { description_of_the_return_value }
	 */
	local.check_empty = function(q_name) {
		return localStorage.getItem(q_name) ? true : false;
	}

	

	/**
	 * Create a New Queue
	 *
	 * @param      {<type>}  q_name  The quarter name
	 * @param      {<type>}  value   The value
	 */
	local.push = function(q_name, value) {

		switch(typeof(value)) {

			case 'string':

				localStorage.setItem(q_name, value);
				break;

			case 'number':

				localStorage.setItem(q_name, value);
				break;

			case 'boolean':

				localStorage.setItem(q_name, value);
				break;

			case 'object':

				if (this.is_object(value)) {
					
					// this.queue.push(value);
					// console.log(this.queue);

				} 

				break;

		}
	}

})();