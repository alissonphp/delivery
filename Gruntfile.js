module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        jshint: {
            all: [
                'Gruntfile.js', 'public/js/app/*.js', 'public/js/canvas/*.js', 'public/js/canvas/components/*.js']
        },
        sass: {
            options: {
                sourcemap: 'none'
            },
            dist: {
                files: {
                    'public/css/materialize.css': 'public/sass/materialize.scss'
                }
            },
            livro: {
                files: {
                    'public/css/app.css': 'public/sass/livro/app.scss'
                }
            }
        },
        uglify: {
            target: {
                files: [{
                    expand: true,
                    cwd: 'public/js/app/',
                    src: ['*.js', '!*.min.js'],
                    dest: 'public/js/app/min/',
                    ext: '.min.js'
                },
                    {
                        expand: true,
                        cwd: 'public/js/app/project/',
                        src: ['*.js', '!*.min.js'],
                        dest: 'public/js/app/min/project/',
                        ext: '.min.js'
                    },
                    {
                        expand: true,
                        cwd: 'public/js/app/theme/',
                        src: ['*.js', '!*.min.js'],
                        dest: 'public/js/app/min/theme/',
                        ext: '.min.js'
                    },
                    {
                        expand: true,
                        cwd: 'public/js/app/library/',
                        src: ['*.js', '!*.min.js'],
                        dest: 'public/js/app/min/library/',
                        ext: '.min.js'
                    }]
            },
            target2: {
                files: [{
                    expand: true,
                    cwd: 'public/js/canvas',
                    src: ['*.js', '!*.min.js'],
                    dest: 'public/js/canvas/min',
                    ext: '.min.js'
                }]
            },
            target3: {
                files: [{
                    expand: true,
                    cwd: 'public/js/canvas/components',
                    src: ['*.js', '!*.min.js'],
                    dest: 'public/js/canvas/components/min',
                    ext: '.min.js'
                }]
            }
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: ['public/js/canvas/min/*.min.js', 'public/js/canvas/components/min/*.min.js'],
                dest: 'public/js/canvas/dist/canvas.min.js'
            }
        },
        cssmin: {
            options: {
                noAdvanced: true
            },
            target: {
                files: [{
                    expand: true,
                    cwd: 'public/css',
                    src: ['*.css', '!*.min.css', '!materialize.css'],
                    dest: 'public/css/min',
                    ext: '.min.css'
                }]
            }
        },
        watch: {
            css: {
                files: 'public/css/*.css',
                tasks: ['cssmin']
            },
            scripts: {
                files: ['Gruntfile.js', 'public/js/app/*.js', 'public/js/app/project/*.js', 'public/js/app/theme/*.js', 'public/js/app/library/*.js', 'public/js/canvas/*.js', 'public/js/canvas/components/*.js'],
                tasks: ['jshint', 'uglify', 'concat']
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.registerTask('default', ['jshint', 'uglify', 'cssmin', 'sass', 'concat']);
};