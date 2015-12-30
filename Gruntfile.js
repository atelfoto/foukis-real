module.exports=function(grunt){
    require('load-grunt-tasks')(grunt);
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
                   'app/webroot/js/home.min.js': ["vendors/js/*.js"]

                }
            }
        },
        cssmin: {
            target: {
                files: {
                    'app/webroot/css/styles.min.css': ['vendors/css/*.css']
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
        watch:{
            dist:{
                files:['vendors/sass/*.scss'],
                tasks:["compass"],
                options:{ spawn:false}
            },
            css:{
                files:['vendors/css/*.css'],
                tasks:['cssmin']
            },
        },
         js:{
                files:['vendors/js/*.js','!vendors/js/min.js'],
                tasks:['jshint','uglify'],
                options: { spawn: false }
            }
        },
        imagemin: {
            dynamic: {
                files: [{
                    expand: true,
                    cwd: '',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'app/webroot/img/'
                }]
            }
        }
    });
    //grunt.registerTask('default',['cssmin'] )
    grunt.registerTask('default',['uglify'] )


}
