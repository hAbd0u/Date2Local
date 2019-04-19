# Date2Local
------------

This is library to help you translate date in different languages, with over 59 language supported, it is light, and depends in no other package, you welcome ;).

## Supported languages
This package contains language files for the following languages:

 - Albanian
 - Arabic
 - Azerbaijani
 - Bangla
 - Basque
 - Belarusian
 - Bosnian
 - Brazilian | Portuguese
 - Bulgarian
 - Catalan
 - Chinese Simplified | Traditional
 - Croatian
 - Czech
 - Danish
 - Dutch
 - English
 - Esperanto
 - Estonian
 - Finnish
 - French
 - Galician
 - Georgian
 - German
 - Greek
 - Hebrew
 - Hindi
 - Hungarian
 - Icelandic
 - Indonesian
 - Italian
 - Japanese
 - Kannada
 - Kazakh
 - Korean
 - Latvian
 - Lithuanian
 - Macedonian
 - Malay
 - Nepali (नेपाली)
 - Norwegian
 - Persian (Farsi)
 - Polish
 - Romanian | Moldavian | Moldovan
 - Russian
 - Serbian (cyrillic)
 - Serbian (latin)
 - Slovak
 - Slovenian
 - Spanish
 - Swahili
 - Swedish
 - Tamil
 - Thai
 - Turkish
 - Turkmen
 - Ukrainian
 - Urdu
 - Uzbek
 - Vietnamese

 
## Installation

### Without Composer

```php
 require_once 'date2local/date2local.php';
```

### With Composer

Hopefully next version ;).

## Usage
### Translate a date

```php
 require_once 'date2local/date2local.php';
	
 $date_str = 'Friday 01 February 2019';
 
 $date2local = new \WebDeveloperFW\Date2Local( $date_str );
 $lang_from = $date2local::ENGLISH;
 $lang_to = $date2local::UZBEK;
 $translated_date = $date2local->Convert2Local( $lang_from, $lang_to );
 if( !$translated_date ) 
     echo $date2local->GetLastError() . "<br>";
 else
     echo 'Translation from ' . $lang_from . ' to ' . $lang_to . ': ' . $translated_date . ' ' . "<br>";
```

### Translate another date
```php
 $date_str = 'Fri 01 Feb 2019';
 // Set the date day and month format
 // By default format is long
 $date2local->SetDateFormat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_SHORT_MONTH );
 
 // set the date string to translate
 $date2local->SetDateString( $date_str );
 
 // Translate the date string
 $translated = $date2local->Convert2Local( $lang_from, $lang_to );
 if( !$translated ) 
     echo $date2local->GetLastError() . "<br>";
 else
     echo 'Translation from ' . $lang_from . ' to ' . $lang_to . ': ' . $translated . ' ' . "<br>";
```

### Convert date string format
```php
 $date_str = 'Friday 01 February 2019';
 $date2local->SetDateFormat( $date2local::FORMAT_LONG_DAY, $date2local::FORMAT_LONG_MONTH );
 $date2local->SetDateString( $date_str );
 
 // Convert 'Friday 01 February 2019' to 'Fri 01 Feb 2019'
 $new_date_format = $date2local->ConvertFromat( $date2local::FORMAT_SHORT_DAY, $date2local::FORMAT_SHORT_MONTH );
 if( !$new_date_format ) 
     echo $date2local->GetLastError() . "<br>";
 else
     echo 'Date fromat: ' . $new_date_format . ' ' . "<br>";
```

### Other helpful methods
#### Date2Local::HasShortDay( $lang_name )
Check if the language has support for short day
```php
echo \WebDeveloperFW\Date2Local::HasShortDay( Date2Local::ENGLISH ); // Return true if it is, FALSE otherwise
```

#### Date2Local::HasShortMonth( $lang_name )
Check if the language has support for short month
```php
 echo \WebDeveloperFW\Date2Local::HasShortMonth( Date2Local::ENGLISH ); // Return true if it is, FALSE otherwise
```

### Date2Local::GetSupportedLanguages()
Get the current supported languages
```php
 var_dump( Date2Local::GetSupportedLanguages() ); // Outputs an array of supported languages
```

## Credits
Originally I inspired by this [library](https://github.com/jenssegers/date), most of language files from there.

## TODO 
- Add support installation via composer.
- Create language file generator.
- Write unit testing.

## License

[![License](https://img.shields.io/badge/License-BSD%202--Clause-orange.svg)](https://opensource.org/licenses/BSD-2-Clause)