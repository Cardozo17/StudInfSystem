
	MySIS.controller('showStudentsController', ['$scope', '$http', function($scope, $http) 
	{

		//default values.
		$scope.table= {};
		$scope.selectedRow= null;

		$http({
			method : 'GET',
			url: 'students/list',

		}).success(function(data){

			$scope.students= data;
			console.log($scope.students)

			//Initializing Table to show all inventoryMasters
			// Data Grid(DataTables)  Settings
			$(document).ready( function ()
			{
			   	$scope.table= $('#table_id').DataTable({

		    	data: $scope.students,
		    	"dom": 'Zlfrtip',  //Columns Resizable
		    	"colResize": {
		    		"tableWidthFixed": false
		    	},
		        colReorder: true,
		    	columns: [
		    			  { data: 'person.document_id'},
		    	          { data: 'person.name' },
		    	          { data: 'person.last_name' },
		    	          { data: 'grade_to_be_register'},
		    	          { data: 'grade_section.section_letter',  "defaultContent": ""},
		    	          { data: 'brothers', "defaultContent": ""},
		    	          { data: 'brothers', "defaultContent": ""},
		    	          { data: 'legal_representative.person.name'},
		    	          { data: 'legal_representative.person.last_name'},
		    	          { data: 'legal_representative.person.document_id'},
		    	          { data: 'parent.person.name', "defaultContent": ""}, //Father
		    	          { data: 'parent.person.last_name', "defaultContent": ""},
		    	          { data: 'parent.person.name', "defaultContent": ""}, //Mother
		    	          { data: 'parent.person.last_name', "defaultContent": ""},
		    	          { data: 'grade_section.teacher.person.name', "defaultContent": ""},
		    	          { data: 'grade_section.teacher.person.last_name', "defaultContent": ""},
		    	      ],
				"columnDefs": [
					      { "targets": 0},
					      { "targets": 1,
					      	"render": function ( data, type, row )
					      	{
					      				if(row.person!=null)
					      				{
               							 	return data +' '+ row.person.last_name;
               							}
            				}
					  	  },
					      { "targets": 2, "visible": false},
					      { "targets": 3, "className": "text-center" },
					      { "targets": 4, "className": "text-center" },
					      { "targets": 5,
					      	"render": function ( data, type, row ) {

					      				//console.log(data)
					      				if(data.length>0)
					      				{
					      					var aux= "";
						      				for(var i=0; i<data.length; i++)
						      				{
						      					if(data[i].person!= null)
                   							 		aux+= data[i].person.name +' '+ data[i].person.last_name + '<br>';
                   							}
               							}

               							data= aux;
               							return data ;
            				}

					  	  },
					      { "targets": 6, "visible": false},
					      { "targets": 7,
					      		"render": function ( data, type, row ) {

               							 return data +' '+ row.legal_representative.person.last_name;
            							}
            			  },
            			  { "targets": 8, "visible": false},
					      { "targets": 9},
					      { "targets": 10,
					      		"render": function ( data, type, row ) {

					      				if(row.parent!=null)
					      				{
               							 	return data +' '+ row.parent.person.last_name;
               							}
            						}
            			  },
					      { "targets": 11, "visible": false},
					      { "targets": 12},
					      { "targets": 13, "visible": false},
					      { "targets": 14, 
					      "render": function ( data, type, row ) {

					      				if(row.grade_section!=null){
					      					if(row.grade_section.teacher!= null){
               							 		return data +' '+ row.grade_section.teacher.person.last_name;
               								}
               							}
            						}},
					      { "targets": 15, "visible": false},
					     ],
		    	language:      {                      //Translating DataTable to Spanish Language
		    	    	    "sProcessing":     "Procesando...",
		    	    	    "sLengthMenu":     "Mostrar _MENU_ registros",
		    	    	    "sZeroRecords":    "No se encontraron resultados",
		    	    	    "sEmptyTable":     "NingÃºn dato disponible en esta tabla",
		    	    	    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    	    	    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    	    	    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    	    	    "sInfoPostFix":    "",
		    	    	    "sSearch":         "Buscar:",
		    	    	    "sUrl":            "",
		    	    	    "sInfoThousands":  ".",
		    	    	    "sLoadingRecords": "Cargando...",
		    	    	    "oPaginate": {
		    	    	        "sFirst":    "Primero",
		    	    	        "sLast":     "Ãšltimo",
		    	    	        "sNext":     "Siguiente",
		    	    	        "sPrevious": "Anterior"
		    	    	    },
		    	    	    "oAria": {
		    	    	        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		    	    	        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    	    	    }
		    	    	},
		    	paging: true,
		    	scrollY: true,
		    	scrollX: true,
		    	scrollCollapse: true,
		    	select:							//Setting you can select only one row at the time option(Need to download something)
		    		{
		    			style: 'single'
		    		}
		    });

		   //Getting the Selected Row
		   $scope.table
	        .on( 'select', function ( e, dt, type, indexes ) {

	        	 $scope.selectedRow= $scope.table.rows( {selected: true} ).data().toArray();
	        	 console.log($scope.selectedRow);

	        })

			});

		}).error(function(){

			console.log("Error obteniendo los estudiantes");
		})

  }]);
