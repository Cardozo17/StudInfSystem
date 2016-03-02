angular.module('SIEApp', ['ngRoute'])
  .controller('showStudentsController', function($scope, $http) {

  			//default values.
			$scope.table= {};
			$scope.selectedRow= null;

			console.log("Angular funciona WIII");

			$http({
				method : 'GET',
				url: 'students/list',
				
			}).success(function(data){

				console.log("Get Done");
				console.log(data);
				$scope.students= data;

				console.log($scope.students[0].person.name)
				//Initializing Table to show all inventoryMasters 
				// Data Grid(DataTables)  Settings 
				$(document).ready( function () 
				{
				   	$scope.table= $('#table_id').DataTable({
				    	
			    	data: $scope.students,
			    	"dom": 'Zlfrtip',  //Columns Resizable
			    	"colResize": {
			            "tableWidthFixed": false,
			        },
			        colReorder: true,
			    	columns: [
			    			  { data: 'person.document_id' },	
			    	          { data: 'person.name' },
			    	          { data: 'person.last_name' },
			    	          {data: 'brothers', "defaultContent": ""},
			    	          {data: 'brothers', "defaultContent": ""},
			    	          {data: 'legal_representative.person.name'},
			    	          {data: 'legal_representative.person.last_name'},
			    	          {data: 'parent.person.name', "defaultContent": ""},
			    	          {data: 'parent.person.last_name', "defaultContent": ""},
			    	          {data: 'teacher.person.name', "defaultContent": ""},
			    	      ],
					"columnDefs": [	 
						      {"width": "10%", "targets": 0},
						      {"width": "10%", "targets": 1},
						      {"width": "10%", "targets": 2},
						      {"width": "20%", "targets": 3, 
						      	"render": function ( data, type, row ) {

						      				console.log(data);
						      				console.log(data.length);
						      				if(data.length>0)
						      				{	
						      					var aux= "";
							      				for(var i=0; i<data.length; i++)
							      				{	
							      					if(data[i].person!= null)	
	                   							 		aux+= data[i].person.name +' '+ data[i].person.last_name + '<br>';
	                   							}

                   							}

                   							data= aux	
                   							return data ;	
                				}

						  	  },
						      {"width": "0%", "targets": 4, "visible": false},
						      {"width": "20%", "targets": 5, 
						      		"render": function ( data, type, row ) {
                   							 return data +' '+ row.legal_representative.person.last_name;
                							}
                			  },
						      {"width": "0%", "targets": 6, "visible": false},
						      {"width": "20%", "targets": 7,
						      		"render": function ( data, type, row ) {

						      				if(row.parent!=null)
						      				{	
                   							 	return data +' '+ row.parent.person.last_name;
                   							}	
                						}
                			  },
						      {"width": "0%", "targets": 8, "visible": false},
						      {"width": "10%", "targets": 9},
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
			    	//responsive: true,
			    	//fixedColums: true, 	    	
			    	paging: true,
			    	scrollY: 300,
			    	scrollX: 500,
			    	scrollCollapse: true,
			    	select:							//Setting you can select only one row at the time option
			    		{
			    			style: 'single'
			    		} 
			    });
			   
			   //Getting the Selected Row
			   $scope.table
		        .on( 'select', function ( e, dt, type, indexes ) {
		        	
		        	 $scope.selectedRow= $scope.table.rows( {selected: true} ).data().toArray();
		            
		        	 console.log(JSON.stringify( $scope.selectedRow ));
		        	 console.log($scope.selectedRow);

		        } )
			        
				}); 


			}).error(function(){

				console.log("Error obteniendo los estudiantes");
			})

  });