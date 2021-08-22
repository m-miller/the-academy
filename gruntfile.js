module.exports = function(grunt) {
	'use strict';

	// Load all grunt tasks
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.registerTask("reload", "reload Chrome on OS X", function() {
		require("child_process").exec("osascript " +
			"-e 'tell application \"Google Chrome\" " +
			"to tell the active tab of its first window' " +
			"-e 'reload' " +
			"-e 'end tell'");
	});

	// Project configuration
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
			options: {
				stripBanners: true,
				banner: '/*! <%= pkg.description %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
						' * <%= pkg.homepage %>\n' +
						' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
						' * Licensed GPLv3+' +
						' */\n'
			},
			main: {
				src: [
					'library/js/vendor/**/*.js',
					'node_modules/slick-carousel/slick/slick.js',
					'library/js/libs/jquery.mosaic.min.js',
					'library/js/libs/scroll-intent.jquery.min.js',
					'library/js/src/scripts.js',
					'library/js/src/acf-autosize.js',
					'library/js/libs/aos.js',
					'library/js/src/munchkin.js'
				],
				dest: 'library/js/main.js'
			},
			styles: {
				src: [
					'node_modules/slick-carousel/slick/slick.css', 
					'node_modules/slick-carousel/slick/slick-theme.css',
					'library/css/style.css', 
					'library/css/jquery.mosaic.min.css',
					'library/css/aos.css'
					
				],
				dest: 'library/css/styles.css'
					},
		},
		uglify: {
			all: {
				files: {
					'library/js/main.min.js': ['library/js/main.js'],
					//'library/js/admin/community-post-promotion.min.js': ['library/js/admin/community-post-promotion.js']
				},
				options: {
					banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
							' * <%= pkg.homepage %>\n' +
							' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
							' * Licensed GPLv3+' +
							' */\n',
					mangle: {
						except: ['jQuery']
					}
				}
			}
		},
		sass: {
			all: {
				files: {
					
					'library/css/style.css': 'library/scss/style.scss',
					'library/css/print.css': 'library/scss/print.scss',
					'library/css/login.css': 'library/scss/login.scss'
				}
			}
		},
		autoprefixer: {
			dist: {
				options: {
					browsers: ['last 1 version', '> 1%', 'ie 8']
				},
				files: {
					'library/css/style.css': ['library/css/style.css']
				}
			}
		},
		cssmin: {
			options: {
				banner: '/*! <%= pkg.title %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
						' * <%= pkg.homepage %>\n' +
						' * Copyright (c) <%= grunt.template.today("yyyy") %>;' +
						' * Licensed GPLv3+' +
						' */\n'
			},
			minify: {
				expand: true,
				cwd: 'library/css/',
				src: ['styles.css', 'print.css','login.css'],
				dest: 'library/css/',
				ext: '.min.css'
			}
		},
		watch: {
			sass: {
				files: ['library/scss/**/*.scss'],
				tasks: ['sass', 'concat', 'cssmin'],
				options: {
					debounceDelay: 500
				}
			},
			scripts: {
				files: ['library/js/src/**/*.js', 'library/js/vendor/**/*.js'],
				tasks: ['concat', 'uglify'],
				options: {
					debounceDelay: 500
				}
			}
		}
	});

	// Default tasks
	grunt.registerTask('js', ['concat', 'uglify']);
	grunt.registerTask('css', ['sass', 'autoprefixer', 'cssmin']);
	grunt.registerTask('default', ['js', 'css']);

	grunt.util.linefeed = '\n';
};