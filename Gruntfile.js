module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		project: {
			app: 'app',
			public: 'public/assets',
			vendor: 'vendor',
			src: '<%= project.app %>/assets',
			scss: '<%= project.src %>/scss',
			js: '<%= project.src %>/js'
		},
		sass: {
			dist: {
				options: {
					style: 'compressed',
					cacheLocation: '/tmp/.sass-cache'
				},
				files: {
					'<%= project.public %>/css/site.css': '<%= project.scss %>/site.scss'
				}
			}
		},
		uglify: {
			dist: {
				files: {
					'<%= project.public %>/js/site.js': [
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/affix.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/alert.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/button.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/carousel.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/collapse.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/dropdown.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/tab.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/transition.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/scrollspy.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/modal.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/tooltip.js',
						'<%= project.vendor %>/twbs/bootstrap-sass/vendor/assets/javascripts/bootstrap/popover.js'
					]
				}
			}
		},
		watch: {
			sass: {
				files: '<%= project.src %>/scss/{,*/}*.{scss,sass}',
				tasks: ['sass:dist']
			}
		}
	});

	/**
	 * Load Grunt plugins
	 */
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	/**
	 * Default task
	 * Run `grunt` on the command line
	 */
	grunt.registerTask('default', [
	  'sass:dist',
	  'uglify',
	  'watch'
	]);
};
