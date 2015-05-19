var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    //mix.less('app.less');

    mix.styles([
        "../assets/bower/bootstrap/dist/css/bootstrap.min.css",
        "../assets/bower/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css",
        "../assets/bower/dynatable/jquery.dynatable.css",
        "../assets/bower/font-awesome/css/font-awesome.css",
        "../assets/bower/datatables/media/css/jquery.dataTables.min.css",
        '../assets/bower/datatables-scroller/css/dataTables.scroller.css',
        "../assets/bower/datatables-colvis/css/dataTables.colVis.css",
        "../assets/bower/datatables-tabletools/css/dataTables.tableTools.css"
    ]);

	mix.scripts([
	'../assets/bower/jquery/dist/jquery.js',
	'../assets/bower/bootstrap/dist/js/bootstrap.js',
	'../assets/bower/datatables/media/js/jquery.dataTables.min.js',
	'../assets/bower/datatables-scroller/js/dataTables.scroller.js',
	'../assets/bower/datatables-colvis/js/dataTables.colVis.js',
	'../assets/bower/datatables-tabletools/js/dataTables.tableTools.js',
    '../assets/js/dataTables.editor.min.js'
	], 'public/js/vendor.js');


});
