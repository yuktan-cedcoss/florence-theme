module.exports = function(grunt) {

 grunt.initConfig({
   pkg: grunt.file.readJSON('package.json'),
   
  jshint: {
    files: ['Gruntfile.js', 'js/**/*.js'],
    options: {
      globals: {
        jQuery: true
      }
    }
  },
  sass: {
    dist: {
      options: {
        sourcemap: 'none',
        style: 'expanded'
      },
      files: {'style.css':'sass/style.scss'}
    }
  },
  watch: {
    sass: {
      options: {
        livereload: false
      },
      files: ['sass/**/*.scss'],
      tasks: ['sass']
    },
    js: {
      files: ['Gruntfile.js', 'js/**/*.js'],
      tasks: ['jshint']
    }
  },
   makepot: {
           target: {
               options: {
                   domainPath: '/languages/',    // Where to save the POT file.
                   exclude: ['node_modules/'], // List of files or directories to ignore.
                   mainFile: 'home.php', // Main project file.
                   keywords: [ //WordPress localisation functions
                   '__:1',
                   '_e:1',
                   '_x:1,2c',
                   'esc_html__:1',
                   'esc_html_e:1',
                   'esc_html_x:1,2c',
                   'esc_attr__:1', 
                   'esc_attr_e:1',
                   'esc_attr_x:1,2c',
                   '_ex:1,2c',
                   '_n:1,2',
                   '_nx:1,2,4c',
                   '_n_noop:1,2',
                   '_nx_noop:1,2,3c'
                  ],
                   potHeaders: { // Headers to add to the generated POT file.
                       poedit: true, // Includes common Poedit headers.
                       'x-poedit-keywordslist': true, // Include a list of all possible gettext functions.
                       'Project-Id-Version': '<%= pkg.name %> <%= pkg.version %>', // Project name and version
                       'Last-Translator': 'MakeWebBetter <webmaster@makewebbetter.com>',
                       'Language-Team': 'ENGLISH <webmaster@makewebbetter.com>',
                       'Report-Msgid-Bugs-To': 'http://makewebbetter.com/'
                   },
                   potFilename: '<%= pkg.name %>.pot',   // Name of the POT file.
                   type: 'wp-theme',  // Type of project (wp-plugin or wp-theme).
                   updateTimestamp: true
               }
           }
       }
}); 

 grunt.loadNpmTasks('grunt-contrib-jshint');
 grunt.loadNpmTasks('grunt-contrib-sass');
 grunt.loadNpmTasks('grunt-contrib-watch');
 grunt.registerTask('default', ['watch']);
 grunt.registerTask('lang', ['makepot','watch']);
 grunt.loadNpmTasks( 'grunt-wp-i18n' );
 //grunt.registerTask('default', ['compass', 'makepot', 'watch']);
};