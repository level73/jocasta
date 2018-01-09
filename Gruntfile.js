module.exports = function(grunt){

  "use strict";

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    less: {
      build: {
        options: {
          paths: ['public/src/less', 'public/src/less/parts', 'public/src/less/conf']
        },
        files: {
          'public/css/<%= pkg.name %>.css': 'public/src/less/main.less'
        }
      }
    },

    copy: {
			build: {
				files: [
					{
						src: 'public/src/components/jquery/dist/jquery.min.js',
						dest: 'public/js/vendor/000-jquery.min.js'
					},
					{
						src: 'public/src/components/bootstrap/dist/js/bootstrap.min.js',
						dest: 'public/js/vendor/001-bootstrap.min.js'
					},
          {
						src: 'public/src/components/bootstrap/dist/css/bootstrap.min.css',
						dest: 'public/css/vendor/bootstrap.min.css'
					},
          {
						src: 'public/src/components/jquery.bootgrid/dist/jquery.bootgrid.min.js',
						dest: 'public/js/vendor/002-jquery.bootgrid.min.js'
					},
					{
						src: 'public/src/components/jquery.bootgrid/dist/jquery.bootgrid.far.min.js',
						dest: 'public/js/vendor/jquery.bootgrid.fa.min.js'
					},
					{
						src: 'public/src/components/jquery.bootgrid/dist/jquery.bootgrid.min.css',
						dest: 'public/css/vendor/jquery.bootgrid.min.css'
					},
					{
						src: 'public/src/components/bootstrap-select/dist/js/bootstrap-select.min.js',
						dest: 'public/js/vendor/003-bootstrap-select.min.js'
					},
					{
						src: 'public/src/components/bootstrap-select/dist/css/bootstrap-select.min.css',
						dest: 'public/css/vendor/bootstrap-select.min.css'
					},
          {
						src: 'public/src/components/moment/min/moment-with-locales.min.js',
						dest: 'public/js/vendor/004-moment-with-locales.min.js'
					},
          {
						src: 'public/src/components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
						dest: 'public/js/vendor/005-bootstrap-datetimepicker.min.js'
					},
          {
						src: 'public/src/components/bootstrap-switch/dist/js/bootstrap-switch.min.js',
						dest: 'public/js/vendor/006-bootstrap-switch.min.js'
					},
          {
						src: 'public/src/components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
						dest: 'public/css/vendor/bootstrap-datetimepicker.min.css'
					},
          {
						src: 'public/src/components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css',
						dest: 'public/css/vendor/bootstrap-switch.min.css'
					},
          {
						src: 'public/src/components/fontawesome/svg-with-js/js/fontawesome-all.min.js',
						dest: 'public/assets/fontawesome-all.min.js'
					},
        ]
      }
    },

    uglify: {
      build: {
        options: {
          preserveComments: false,
          mangle: false
        },
        files: {
          'public/js/<%= pkg.name %>.min.js': 'public/src/js/main.js'
        }
      }
    },

    watch: {

      less: {
        files: ['public/src/less/*', 'public/src/less/conf/*', 'public/src/less/parts/*'],
        tasks: 'less:build',
        options: {
          livereload: true
        }
      },

      uglify: {
        files: ['public/src/js/main.js'],
        tasks: 'uglify:build'
      }
    }

  });

  // Load Plugins
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  // Tasks
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('build', [
    'copy:build',
    'less:build',
    'uglify:build'
  ]);
};
