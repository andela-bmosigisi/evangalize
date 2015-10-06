Evangalize
==========

This package allows you to do analysis on a github user,
by providing his username. It counts the number of repositories
and informs you what category of Evangelist the user is.
Also, the returned details of a particular user are provided
and may be used for whatever else purpose

## Install

- Clone the Repo
- Navigate to /1B
- Run:
    composer install

## Usage

```
    use Burayan\Evangalize\Evangelist;
    use Burayan\Evangalize\EvangelistAnalysis;
    
    $evangelist = new Evangelist("username");
    $analysis = new EvangelistAnalysis($evangelist);

    $analysis->init();
    $analysis->getEvangelistStatus();
```

## Testing

    composer test