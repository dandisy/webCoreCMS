## 1. webCore Platform
### The Concept

    Admin Page - UI Component - Front Page

1.  Backend Page (Admin)
    
    Scope of Admin Page :    
    preparing user input, and then for input data manually or by data source
    
2. UI Component (just a part of page)

    Scope of UI Component (widget) :    
    provide reusable part of UI (widget) to glue in template of page,
    and defining tracking configuration user interaction for personalization
         
    Scope of Page :    
    layout and styling UI Component generally to be a Page by incorporating a template
    
3. Frontend Page

    Scope of Front Page :    
    provide User Experience with content personalization using Persona and Pattern

### Installation

Copy and paste in terminal line by line, just hit Enter key

    git clone https://github.com/dandisy/webCoreCMS.git

    composer install

    rm -r vendor/infyomlabs
    
    cp -r infyomlabs vendor

    rm -r vendor/infinety-es
    
    cp -r infinety-es vendor

    cp .env.example .env

Make sure your server, create "core" database, edit .env using your favorite editor, 
for example using nano editor copy and paste this in terminal, and hit Enter key

    sudo nano .env

Again copy and paste in terminal line by line, and hit Enter key

    php artisan key:generate

    php artisan migrate --seed

Finally

    php artisan storage:link

then get it all on your favorite browser,

### Todo

1. GUI for manage Admin Menu Item / Folder Item
2. GUI for manage Content Field, Data Table, Multi Language and History
3. GUI for manage Component Widget
4. GUI for manage Frontend Menu, like wordpress menu

5. console command to generate html input (select) with data from related model
    - define field option, 
    - add get option in Common\GeneratorField, 
    - add htmlvalue in Utils\HTMLFieldGenerator - and passing to template,
    - insert get repository in controller create and edit generator

6. personalization

### Dependency

    * infyomlabs/laravel-generator
    * santigarcor/laratrust
    * atayahmet/laravel-nestable
    * infinety-es/filemanager
    * barryvdh/laravel-debugbar
    * arrilot/laravel-widgets
    * spatie/laravel-activitylog
    * league/glide-laravel
    
    * tymon/jwt-auth
    * seguce92/laravel-dompdf
    * maatwebsite/excel
    * khill/lavacharts

    For theme use :
    facuz/laravel-themes based on thinhbuzz/laravel-theme
    or yaapis/Theme
    instead teepluss/laravel-theme
    
    * nwidart/laravel-modules -> OPTIONAL
    * lavary/laravel-menu -> OPTIONAL

//------------------------------------------------#


## 2. Laravel Generator
### Perspective :

    HUMAN
    Interface       -   Tools (Worker)              -   Executor
    Commands\*      -   Common\* and Utils\*        -   Generators\* 
    
    COMPUTER
    Interface       -   Tools (Worker)              -   Executor
    Generators\*    -   Common\* and Utils\*        -   Commands\*    
    
### Guidance

1. To add HTML type definition, add and edit these :
    * add stub file in adminlte-templates\templates\scaffold\fields
    * add stub file in adminlte-templates\templates\vuejs\fields
    * edit Utils\HTMLFieldGenerator

    * edit Generators\ViewGenerator
    * edit Generators\VueJs\ViewGenerator

2. To add command, command option, or fields option
    * edit or add Common\\*
    * edit or add Commands\\* (BaseCommand, etc)
        
### Note

* Commands\\* : 
    
    use Common\CommandData, 
    use Utils\FileUtil
    use Generator\* 
    
    base Commands\BaseCommand

    - parsing console command
    - initializing commandData
    - execute Generators\\* to generating files and migrating database table

* Utils\GeneratorFieldsInputUtil : 
    
    use Common\GeneratorField

    - get fields specification from console command
    - return field specification by utilizing Common\GeneratorField

* Utils\HTMLFieldGenerator : 
    
    use Common\GeneratorField

    - return fieldTemplate will be used

* Common\GeneratorField : 

    - parsing parts of fields specification (db type, html input, option)
    - preparing migration

* Common\GeneratorConfig :
    
    - load, init and set config
    - get console command option

* Common\CommandData : 

    use Utils\GeneratorFieldsInputUtil
    use Utils\TableFieldsGenerator
    
    - get and set commandData from config, file, and console

* Generators\\* : 

    use Utils\FileUtil
    use Common\CommandData    
    use Utils\HTMLFieldGenerator in Generators\Scaffold\ViewGenerator
    
    base Generators\BaseGenerator

    - define generator functionality with data and template parameters to be used
    - define rollback


#
by dandi@redbuzz.co.id