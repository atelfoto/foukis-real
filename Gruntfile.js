module.exports=function(grunt){

    require('load-grunt-tasks')(grunt);
   grunt.loadNpmTasks('grunt-devtools');
   grunt.loadNpmTasks('grunt-fontello');
    grunt.initConfig({
        jshint: {
            all: ['vendors/js/**.js', '!vendors/js/*.min.js']
        },
        uglify: {
            options:{
                mangle:false
            },
            dist: {
                files: {
                    'app/webroot/js/home.min.js': ["vendors/js/jquery.min.js","vendors/js/*.js",'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'],
                    'app/webroot/js/admin.min.js': ["vendors/js/jquery.min.js",'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js',"bower_components/bootstrap-toggle/js/bootstrap-toggle.js","vendors/js/admin/app.min.js"]
                    //'app/webroot/js/admin.min.js': ["bower_components/bootstrap-toggle/js/bootstrap-toggle.js","node_modules/datatables.net/js/jquery.dataTables.js"]

                }
            }
        },
        fontello: {
        	options: {
        		scss: true,
        		force: true
        	},
        	dist: {
        		options: {
        			config  : 'vendors/fonts/fontello/config.json',
        			fonts   : 'vendors/fonts/fontello/fonts/',
        			styles  : 'vendors/sass/fonts/fontello/',
        		}
        	},
        	dev: {
        		options: {
        			config  : 'vendors/fonts/fontello/config.json',
        			fonts   : 'app/webroot/fonts/fontello/',
        		}
        	},
        	admindist: {
        		options: {
        			config  : 'vendors/fonts/admin/fontello/config.json',
        			fonts   : 'vendors/fonts/admin/fontello/fonts/',
        			styles  : 'vendors/sass/admin/fonts/fontello/',
        		}
        	},
        	admindev: {
        		options: {
        			config  : 'vendors/fonts/admin/fontello/config.json',
        			fonts   : 'app/webroot/fonts/admin/fontello/',
        		}
        	},
        },
        cssmin: {
            target: {
                files: {
                    'app/webroot/css/styles.min.css': ['vendors/css/styles.css'],
                    'app/webroot/css/admin.min.css': ['vendors/css/admin.css','node_modules/datatables.net-dt/css/jquery.dataTables.css'],
                    'app/webroot/css/admin1.min.css': ["vendors/css/admin1.css"],
                    'app/webroot/css/wysiwyg.css': ["vendors/css/wysiwyg.css"],
                    'app/webroot/css/AdminLTE.min.css': ["vendors/css/AdminLTE.css"]
                }
            }
        },
        compass: {
        	dist: {
        		options: {
        			config: 'vendors/config.rb'
        		}
        	}
        },
        imagemin: {
        	dist: {
        		files: [{
        			expand: true,
        			cwd: 'vendors/img/',
        			src: ['*.{png,jpg,gif}'],
        			dest: 'app/webroot/img/'
        		}]
        	}
        },
        watch:{
        	options:{
        		livereload: true,
        	},
        	dist:{
        		files:['vendors/sass/**/*.scss'],
        		tasks:["compass"],
        		options:{ spawn:false}
        	},
        	css:{
        		files:['vendors/css/*.css'],
        		tasks:['cssmin']
        	},
        	js:{
        		files:['vendors/js/*.js','!vendors/js/*.min.js'],
        		tasks:['jshint','uglify'],
                options: { spawn: false }
        	},
        	img:{
        		files:['vendors/img/*.png','vendors/img/*.jpg'],
        		tasks:['imagemin']
        	},
        },

        replace: {
            dist: {
                src: ['css/min.css'],
                overwrite: true,                 // overwrite matched source files
                replacements: [{
                  from: "img/",
                  to: "app/webroot/img/"
                }]
            }
        }
    });
    grunt.registerTask('default',['replace'] )
    //grunt.registerTask('default',['fontello'] )


}
