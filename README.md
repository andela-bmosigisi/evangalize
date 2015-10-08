Evangalize
==========

This package allows you to do analysis on a github user,
by providing his username. It counts the number of repositories
and informs you what category of Evangelist the user is.
Also, the returned details of a particular user are provided
and may be used for whatever else purpose.

A lot more features coming soon!!!

## Install

- composer require burayan/evangalize
- Run:
    composer install

## Usage

```php
    
    use Burayan\Evangalize\Evangelist;
    use Burayan\Evangalize\EvangelistAnalysis;
    
    $evangelist = new Evangelist("username");
    $analysis = new EvangelistAnalysis($evangelist);

    $analysis->init();
    $analysis->getEvangelistStatus();

```


## License

The MIT License (MIT). Please see [License File](https://opensource.org/licenses/MIT) for more information.
