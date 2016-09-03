module.exports=function(grunt){

    require('load-grunt-tasks')(grunt);
   grunt.loadNpmTasks('grunt-devtools');
   grunt.loadNpmTasks('grunt-fontello');
    grunt.initConfig({
        jshint: {
            all: ['vendors/js/*.js', '!vendors/js/*.min.js']
        },
        uglify: {
            options:{
                mangle:false
            },
            dist: {
                files: {
                    'app/webroot/js/home.min.js': ["vendors/js/jquery.min.js","vendors/js/*.js"],
                    'app/webroot/js/bootstrap-toggle.js': ["bower_components/bootstrap-toggle/js/bootstrap-toggle.js"]

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
        			fonts   : 'vendors/fonts/fontello/',
        			styles  : 'vendors/sass/fonts/fontello/',
        		}
        	},
        	dev: {
        		options: {
        			config  : 'vendors/fonts/fontello/config.json',
        			fonts   : 'app/webroot/fonts/fontello',
        		}
        	}
        },
        cssmin: {
            target: {
                files: {
                    'app/webroot/css/styles.min.css': ['vendors/css/styles.css'],
                    'app/webroot/css/admin.min.css': ['vendors/css/admin.css'],
                    'app/webroot/css/bootstrap-toggle.min.css': ["bootstrap-toggle/css/bootstrap-toggle.css"]
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
        		files:['vendors/sass/*.scss'],
        		tasks:["compass"],
        		options:{ spawn:false}
        	},
        	css:{
        		files:['vendors/css/*.css'],
        		tasks:['cssmin']
        	},
        	js:{
        		files:['vendors/js/*.js','!vendors/js/min.js'],
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
