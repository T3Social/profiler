# HumHub Profiler

> ⚠ Do not install this module on a production environment!

This HumHub module can be used to emulate an active HumHub network with a certain amount of users, spaces and content.
This module uses yii faker library in order to generate partly random test data.

 - https://github.com/yiisoft/yii2-faker/blob/master/docs/guide/basic-usage.md
 - https://github.com/fzaninotto/Faker#fakerproviderdatetime
 
You can furthermore use this module for profiling purposes.

## Fixtures

### Users

  - First user with id 1 is always in admin group with name `root`
  - Other usernames are of format User<index>, so user with id 2 has username User1
  - All user passwords are `test`
  - By default 2000 Users will be created

### Spaces

 - Space names are random
 - Users will be spread in steps of 100 through the first spaces
 - By default 2000 Spaces will be created
 
### Content

 - This module will generate post and related content created activities
 - The content is spread through the first few spaces and profile of user1
 - By default 80000 content entries will be created (50/50 Activity/Post)

### Following

 - By default User 1 has 1000 followers
 - By default the first few spaces
 
### Friends

 - By default User 1 has 1000 friends

### Generate fixture data

**Generate all:**

```
php yii profiler/fixture/generate-all
```

![](./docs/images/60d69b5d.png)

**Generate specific fixture:**

```
php yii profiler/fixture/generate content/content
```

### Load fixture data

> ⚠ This will overwrite existing data in your database!

**Load all:**

```
php yii profiler/fixture/load "*"
```

> Note: The execution of this command may take some time...

**Load specific fixture:**

```
php yii profiler/fixture/load "Content"
```

### Profiling

Its recommend to set `SET GLOBAL query_cache_size = 0;` in your test mysql db in order to test against 
non cached query times.

`SHOW VARIABLES LIKE 'query_cache_size';` should return a value of `0`.

#### Run profiler

**Run stream profiler with default run count:**

```
php yii profiler/stream/run
```

**Set run count:**

```
php yii profiler/stream/run --count=200
```

## Further reading

 - https://github.com/yiisoft/yii2-faker/blob/master/docs/guide/basic-usage.md
 - https://github.com/fzaninotto/Faker#fakerproviderdatetime
 
### Implement custom profiler

```
class MyProfilerController extends ProfileController
{
    public function actionRun()
    {
       $result = $this->runProfiler(function(ProfilerResult $result) {
            // DO SOME WORK YOU WANT TO PROFILE
        }, $this->title);

        $this->printResult($result);
    }
}
```