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
        "../assets/bower/font-awesome/css/font-awesome.min.css",
        "../assets/bower/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css",
        "../assets/bower/datatables/media/css/jquery.dataTables.css",
        '../assets/bower/datatables-scroller/css/dataTables.scroller.css',
        "../assets/bower/datatables-colvis/css/dataTables.colVis.css",
        "../assets/bower/datatables-tabletools/css/dataTables.tableTools.css",
        "../assets/css/base.css"
    ]);

	mix.scripts([
	'../assets/bower/jquery/dist/jquery.js',
	'../assets/bower/bootstrap/dist/js/bootstrap.js',
	'../assets/bower/mustache/mustache.min.js',
	'../assets/bower/mustache-wax/mustache-wax.min.js',
	'../assets/bower/underscore/underscore-min.js',
	'../assets/bower/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js',
	'../assets/bower/datatables/media/js/jquery.dataTables.min.js',
	'../assets/bower/datatables-scroller/js/dataTables.scroller.js',
	'../assets/bower/datatables-colvis/js/dataTables.colVis.js',
	'../assets/bower/datatables-tabletools/js/dataTables.tableTools.js',
	'../assets/bower/vue/dist/vue.min.js',
	'../assets/js/expenses.js'
	], 'public/js/vendor.js');


});
