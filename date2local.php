<?php
    namespace WebDeveloperFW;

    class Date2Local
    {
        const ARABIC = 'ar.php';
        const AZERBAIJANI = 'az.php';
        
		const BENGALI = 'bd.php';
		const BELARUSIAN = 'be.php';
		const BULGARIAN = 'bg.php';
		const BOSNIAN = 'bs.php';
		const CATALAN_VALENCIAN = 'ca.php';
		const CZECH = 'cs.php';
		const WELSH = 'cy.php';
		const DANISH = 'da.php';
		const GERMAN = 'de.php';
		const GREEK_MODERN = 'el.php';
		const ENGLISH = 'en.php';
		const ESPERANTO = 'eo.php';
		const SPANISH = 'es.php';
		const ESTONIAN = 'et.php';
		const BASQUE = 'eu.php';
		const PERSIAN = 'fa.php';
		const FINNISH = 'fi.php';
		const FRENCH = 'fr.php';
		const GALICIAN = 'gl.php';
		const HEBREW_MODERN = 'he.php';
		const HINDI = 'hi.php';
		const CROATIAN = 'hr.php';
		const HUNGARIAN = 'hu.php';
		const INDONESIAN = 'id.php';
		const ICELANDIC = 'is.php';
		const ITALIAN = 'it.php';
		const JAPANESE = 'ja.php';
		const GEORGIAN = 'ka.php';
		const KAZAKH = 'kk.php';
		const KOREAN = 'ko.php';
		const LITHUANIAN = 'lt.php';
		const LATVIAN = 'lv.php';
		const MACEDONIAN = 'mk.php';
		const MALAY = 'ms.php';
		const NEPALI = 'ne.php';
		const DUTCH_FLEMISH = 'nl.php';
		const NORWEGIAN = 'no.php';
		const POLISH = 'pl.php';
		const PORTUGUESE = 'pt.php';
		const ROMANIAN = 'ro.php';
		const RUSSIAN = 'ru.php';
		const SLOVAK = 'sk.php';
		const SLOVENIAN = 'sl.php';
		const ALBANIAN = 'sq.php';
		const SERBIAN = 'sr.php';
		const SWEDISH = 'sv.php';
		const SWAHILI = 'sw.php';
		const TAMIL = 'ta.php';
		const THAI = 'th.php';
		const TURKMEN = 'tk.php';
		const TURKISH = 'tr.php';
		const UIGHUR_UYGHUR = 'ug.php';
		const UKRAINIAN = 'uk.php';
		const UZBEK = 'uz.php';
		const VIETNAMESE = 'vi.php';
		const TAIWAN = 'zh-TW.php';
        const CHINESE = 'zh.php';
        
        const FORMAT_SHORT_DAY = 0;
        const FORMAT_SHORT_MONTH = 0;

        const FORMAT_LONG_DAY = 1;
        const FORMAT_LONG_MONTH = 1;


        private $dateString = '';
        private $format = '';

        private $isLongDayString = TRUE;
        private $isLongMonthString = TRUE;

        private $fromLanguage = NULL;
        private $toLanguage = NULL;

        private $lastErrorMessage = '';

        /**
         * Set the date string, and it's format (long or short day/ month ), 
		 * by default it is long format.
         * @param  String       $date_string
         * @param  String       $long_day
         * @param  String       $long_month
         */
        public function __construct( $date_string, $long_day = self::FORMAT_LONG_DAY, $long_month = self::FORMAT_LONG_MONTH )
        {
            $this->dateString = $date_string;

            if( $long_day == FALSE )
                $this->isLongDayString = FALSE;

            if( $long_month == FALSE )
                $this->isLongMonthString = FALSE;
        }

        /**
         * Convert the $date_string from language you set in $from_language 
         * to the language you set in $to_language.
         * NOTE: By default it will convert it to English. 
         * @param  String       $from_language
         * @param  String       $to_language
         * @throws Exception    Thrown when the language is unknown, or short format is not supported
         * @return String       The date string translated
         */
        public function Convert2Local( $from_language, $to_language = self::ENGLISH )
        {
            $this->fromLanguage = __DIR__ . '/langs/' . $from_language;
            $this->toLanguage = __DIR__ . '/langs/' . $to_language;
            if( !file_exists( $this->fromLanguage ) ) {
                throw new Exception( 'Language source is unknown or file translation is missing.' );
            }
            
			if( !file_exists( $this->toLanguage ) ) {
                throw new Exception( 'Language destination is unknown or file translation is missing.' );
            }

            $this->fromLanguage = include( $this->fromLanguage );
            $this->toLanguage = include( $this->toLanguage );

            if( $this->isLongDayString == FALSE && $this->toLanguage['HasShortDay'] == FALSE ) {
                $this->lastErrorMessage = 'The destination language has no short day string support.';
                return FALSE;
            }
			
            if( $this->isLongMonthString == FALSE && $this->toLanguage['HasShortMonth'] == FALSE ) {
                $this->lastErrorMessage = 'The destination language has no short month string support';
                return FALSE;
            }

            $new_date = '';
            if( !$this->isLongDayString ) {
                $new_date = str_replace( $this->fromLanguage['ShortDay'], $this->toLanguage['ShortDay'], $this->dateString );
            }
            else {
                $new_date = str_replace( $this->fromLanguage['LongDay'], $this->toLanguage['LongDay'], $this->dateString );
            }

            if( !$this->isLongMonthString ) {
                $new_date = str_replace( $this->fromLanguage['ShortMonth'], $this->toLanguage['ShortMonth'], $new_date );
            }
            else {
                $new_date = str_replace( $this->fromLanguage['LongMonth'], $this->toLanguage['LongMonth'], $new_date );
                if( isset( $this->fromLanguage['LongMonthPlural'] ) ) {
                    if ( isset( $this->toLanguage['LongMonthPlural'] ) )
                        $new_date = str_replace( $this->fromLanguage['LongMonthPlural'], $this->toLanguage['LongMonthPlural'], $new_date );
                    else
                        $new_date = str_replace( $this->fromLanguage['LongMonthPlural'], $this->toLanguage['LongMonth'], $new_date );
                }
            }
                        
			return $new_date;
		}

		/**
         * Set the date string.
         * @param  String       $date_string
         */
        public function SetDateString( $date_string )
        {
            $this->dateString = $date_string;
        }

		/**
         * Set the source date string format.
         * @param  String       $long_day
         * @param  String       $long_month
         */
        public function SetDateFormat( $long_day, $long_month )
        {
            if( $long_day != self::FORMAT_LONG_DAY )
                $this->isLongDayString = self::FORMAT_SHORT_DAY;

            if( $long_month != self::FORMAT_LONG_MONTH )
                $this->isLongMonthString = self::FORMAT_SHORT_MONTH;
        }

		/**
         * Get the source date string format.
         * @return Array        Return the format in array
         */
        public function GetDateFormat()
        {
            return array( 'isLongDayString' => $this->isLongDayString, 
                          'isLongMonthString' => $this->isLongMonthString );
        }

		//
        // Set the source and destination language of translation
        // @param  String       $from_language
        // @param  String       $to_language
        //
        public function SetTranslation( $from_language, $to_language ) {
            $this->fromLanguage = $from_language;
            $this->toLanguage = $to_language;
        }

		//
        // Convert the date string format from short to long and vice versa.
        // @param  String       $from_language
        // @param  String       $to_language
        // @return Bool | String       Returns FALSE if there is error, or date string converted on success
        //
        public function ConvertFromat( $to_day, $to_month ) {
            if( $to_day == self::FORMAT_SHORT_DAY )
                if( !self::HasShortDay( $this->fromLanguage ) ) {
                    $this->lastErrorMessage = 'The language has no short day support.';
                    return FALSE;
                }

            if( $to_month == self::FORMAT_SHORT_MONTH )
                if( !self::HasShortMonth( $this->fromLanguage ) ) {
                    $this->lastErrorMessage = 'The language has no short month support.';
                    return FALSE;
                }

            $index = 0;
            $date_array = explode( ' ', $this->dateString );  
            if( $to_day == $this->isLongDayString ) {
                foreach( $date_array as $parts ) {
                    if( $key = array_search( $parts, $this->fromLanguage['LongDay'] ) ) {
                        $date_array[$index] = $this->fromLanguage['ShortDay'][$key];
                        break;
                    }
    
                    ++$index;
                }
            } 
            else {
                foreach( $date_array as $parts ) {
                    if( $key = array_search( $parts, $this->fromLanguage['ShortDay'] ) ) {
                        $date_array[$index] = $this->fromLanguage['LongDay'][$key];
                        break;
                    }
    
                    ++$index;
                }
            }

            if( $to_month == $this->isLongMonthString ) {
                foreach( $date_array as $parts ) {
                    if( $key = array_search( $parts, $this->fromLanguage['LongMonth'] ) ) {
                        $date_array[$index] = $this->fromLanguage['ShortMonth'][$key];
                        break;
                    }
    
                    ++$index;
                }
            }  
            else {
                foreach( $date_array as $parts ) {
                    if( $key = array_search( $parts, $this->fromLanguage['ShortMonth'] ) ) {
                        $date_array[$index] = $this->fromLanguage['LongMonth'][$key];
                        break;
                    }
    
                    ++$index;
                }
            }
            
            $date_array = implode( ' ', $date_array );  
            return $date_array;
        }

		//
        // Check if the destination language has support for short day format.
        // @param  String       $destination_lang
        // @return Bool         Returns FALSE if there is no support for short day format, TRUE if there is.
        //
        static public function HasShortDay( $destination_lang )
        {
            return $destination_lang['HasShortDay'];
        }

		//
        // Check if the destination language has support for short day format.
        // @param  String       $destination_lang
        // @return Array         Returns FALSE if there is no support for short day format, TRUE if there is.
        //
        static public function GetSupportedLanguages()
        {
            $supported_languages = array(
                                        array( 'LanguageName' => 'Arabic', 'LanguageCode' => 'ar', 'LanguageFile' => 'ar.php' ),     
                                        array( 'LanguageName' => 'Azerbaijani', 'LanguageCode' => 'az', 'LanguageFile' => 'az.php' ),     
                                        array( 'LanguageName' => 'Bengali', 'LanguageCode' => 'bd', 'LanguageFile' => 'bd.php' ),     
                                        array( 'LanguageName' => 'Belarusian', 'LanguageCode' => 'be', 'LanguageFile' => 'be.php' ),     
                                        array( 'LanguageName' => 'Bulgarian', 'LanguageCode' => 'bg', 'LanguageFile' => 'bg.php' ),     
                                        array( 'LanguageName' => 'Bosnian', 'LanguageCode' => 'bs-BA', 'LanguageFile' => 'bs-BA.php' ),     
                                        array( 'LanguageName' => 'Catalan', 'LanguageCode' => 'ca', 'LanguageFile' => 'ca.php' ),     
                                        array( 'LanguageName' => 'Czech', 'LanguageCode' => 'cs', 'LanguageFile' => 'cs.php' ),     
                                        array( 'LanguageName' => 'Danish', 'LanguageCode' => 'da', 'LanguageFile' => 'da.php' ),     
                                        array( 'LanguageName' => 'German', 'LanguageCode' => 'de', 'LanguageFile' => 'de.php' ),     
                                        array( 'LanguageName' => 'Greek', 'LanguageCode' => 'el', 'LanguageFile' => 'el.php' ),     
                                        array( 'LanguageName' => 'English', 'LanguageCode' => 'en', 'LanguageFile' => 'en.php' ),     
                                        array( 'LanguageName' => 'Esperanto', 'LanguageCode' => 'eo', 'LanguageFile' => 'eo.php' ),     
                                        array( 'LanguageName' => 'Spanish', 'LanguageCode' => 'es', 'LanguageFile' => 'es.php' ),     
                                        array( 'LanguageName' => 'Estonian', 'LanguageCode' => 'et', 'LanguageFile' => 'et.php' ),     
                                        array( 'LanguageName' => 'Basque', 'LanguageCode' => 'eu', 'LanguageFile' => 'eu.php' ),     
                                        array( 'LanguageName' => 'Persian', 'LanguageCode' => 'fa', 'LanguageFile' => 'fa.php' ),     
                                        array( 'LanguageName' => 'Finnish', 'LanguageCode' => 'fi', 'LanguageFile' => 'fi.php' ),     
                                        array( 'LanguageName' => 'French', 'LanguageCode' => 'fr', 'LanguageFile' => 'fr.php' ),     
                                        array( 'LanguageName' => 'Galician', 'LanguageCode' => 'gl', 'LanguageFile' => 'gl.php' ),     
                                        array( 'LanguageName' => 'Hebrew', 'LanguageCode' => 'he', 'LanguageFile' => 'he.php' ),     
                                        array( 'LanguageName' => 'Hindi', 'LanguageCode' => 'hi', 'LanguageFile' => 'hi.php' ),     
                                        array( 'LanguageName' => 'Croatian', 'LanguageCode' => 'hr', 'LanguageFile' => 'hr.php' ),     
                                        array( 'LanguageName' => 'Hungarian', 'LanguageCode' => 'hu', 'LanguageFile' => 'hu.php' ),     
                                        array( 'LanguageName' => 'Indonesian', 'LanguageCode' => 'id', 'LanguageFile' => 'id.php' ),     
                                        array( 'LanguageName' => 'Icelandic', 'LanguageCode' => 'is', 'LanguageFile' => 'is.php' ),     
                                        array( 'LanguageName' => 'Italian', 'LanguageCode' => 'it', 'LanguageFile' => 'it.php' ),     
                                        array( 'LanguageName' => 'Japanese', 'LanguageCode' => 'ja', 'LanguageFile' => 'ja.php' ),     
                                        array( 'LanguageName' => 'Georgian', 'LanguageCode' => 'ka', 'LanguageFile' => 'ka.php' ),     
                                        array( 'LanguageName' => 'Kazakh', 'LanguageCode' => 'kk', 'LanguageFile' => 'kk.php' ),     
                                        array( 'LanguageName' => 'Korean', 'LanguageCode' => 'ko', 'LanguageFile' => 'ko.php' ),     
                                        array( 'LanguageName' => 'Lithuanian', 'LanguageCode' => 'lt', 'LanguageFile' => 'lt.php' ),     
                                        array( 'LanguageName' => 'Latvian', 'LanguageCode' => 'lv', 'LanguageFile' => 'lv.php' ),     
                                        array( 'LanguageName' => 'Macedonian', 'LanguageCode' => 'mk', 'LanguageFile' => 'mk.php' ),     
                                        array( 'LanguageName' => 'Malay', 'LanguageCode' => 'ms', 'LanguageFile' => 'ms.php' ),     
                                        array( 'LanguageName' => 'Nepali', 'LanguageCode' => 'ne', 'LanguageFile' => 'ne.php' ),     
                                        array( 'LanguageName' => 'Dutch', 'LanguageCode' => 'nl', 'LanguageFile' => 'nl.php' ),     
                                        array( 'LanguageName' => 'Norwegian', 'LanguageCode' => 'no', 'LanguageFile' => 'no.php' ),     
                                        array( 'LanguageName' => 'Polish', 'LanguageCode' => 'pl', 'LanguageFile' => 'pl.php' ),     
                                        array( 'LanguageName' => 'Portuguese', 'LanguageCode' => 'pt', 'LanguageFile' => 'pt.php' ),     
                                        array( 'LanguageName' => 'Romanian', 'LanguageCode' => 'ro', 'LanguageFile' => 'ro.php' ),     
                                        array( 'LanguageName' => 'Russian', 'LanguageCode' => 'ru', 'LanguageFile' => 'ru.php' ),     
                                        array( 'LanguageName' => 'Kannada', 'LanguageCode' => 'sh', 'LanguageFile' => 'sh.php' ),     
                                        array( 'LanguageName' => 'Slovak', 'LanguageCode' => 'sk', 'LanguageFile' => 'sk.php' ),     
                                        array( 'LanguageName' => 'Slovenian', 'LanguageCode' => 'sl', 'LanguageFile' => 'sl.php' ),     
                                        array( 'LanguageName' => 'Albanian', 'LanguageCode' => 'sq', 'LanguageFile' => 'sq.php' ),     
                                        array( 'LanguageName' => 'Serbian', 'LanguageCode' => 'sr-SP', 'LanguageFile' => 'sr-SP.php' ),     
                                        array( 'LanguageName' => 'Serbian', 'LanguageCode' => 'sr', 'LanguageFile' => 'sr.php' ),     
                                        array( 'LanguageName' => 'Swedish', 'LanguageCode' => 'sv', 'LanguageFile' => 'sv.php' ),     
                                        array( 'LanguageName' => 'Swahili', 'LanguageCode' => 'sw', 'LanguageFile' => 'sw.php' ),     
                                        array( 'LanguageName' => 'Tamil', 'LanguageCode' => 'ta', 'LanguageFile' => 'ta.php' ),     
                                        array( 'LanguageName' => 'Thai', 'LanguageCode' => 'th', 'LanguageFile' => 'th.php' ),     
                                        array( 'LanguageName' => 'Turkmen', 'LanguageCode' => 'tk', 'LanguageFile' => 'tk.php' ),     
                                        array( 'LanguageName' => 'Turkish', 'LanguageCode' => 'tr', 'LanguageFile' => 'tr.php' ),     
                                        array( 'LanguageName' => 'Ukrainian', 'LanguageCode' => 'uk', 'LanguageFile' => 'uk.php' ),     
                                        array( 'LanguageName' => 'Uzbek', 'LanguageCode' => 'uz', 'LanguageFile' => 'uz.php' ),     
                                        array( 'LanguageName' => 'Vietnamese', 'LanguageCode' => 'vi', 'LanguageFile' => 'vi.php' ),     
                                        array( 'LanguageName' => 'Chinese', 'LanguageCode' => 'zh', 'LanguageFile' => 'zh.php' ),
                                        );
            return $supported_languages;
        }

		//
        // Check if the destination language has support for short month format.
        // @param  String       $destination_lang
        // @return Bool         Returns FALSE if there is no support for short month format, TRUE if there is.
        //
        static public function HasShortMonth( $destination_lang )
        {
            return $destination_lang['HasShortMonth'];
        }
		
        // 
        // Return the description of the last error.
        // @return String
        // 
        public function GetLastError()
        {
            return $this->lastErrorMessage;
        }
		
        // 
        // Output readable debugging 
        // @param  String       $title      The title of debugged message
        // @param  String       $variable   The content of message
        // @return String       
        // 
        private function debugOutput( $title, $text ) {
            return '<pre><b>' . $title . '</b><br>' . print_r( $text, 1 ) . '</pre>';
        } 
    }
?>
