<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage BUGSTER
 * @since BUGSTER 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'bugster_storage_get' ) ) {
	function bugster_storage_get( $var_name, $default = '' ) {
		global $BUGSTER_STORAGE;
		return isset( $BUGSTER_STORAGE[ $var_name ] ) ? $BUGSTER_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'bugster_storage_set' ) ) {
	function bugster_storage_set( $var_name, $value ) {
		global $BUGSTER_STORAGE;
		$BUGSTER_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'bugster_storage_empty' ) ) {
	function bugster_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $BUGSTER_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $BUGSTER_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $BUGSTER_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $BUGSTER_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'bugster_storage_isset' ) ) {
	function bugster_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $BUGSTER_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $BUGSTER_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $BUGSTER_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $BUGSTER_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'bugster_storage_inc' ) ) {
	function bugster_storage_inc( $var_name, $value = 1 ) {
		global $BUGSTER_STORAGE;
		if ( empty( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = 0;
		}
		$BUGSTER_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'bugster_storage_concat' ) ) {
	function bugster_storage_concat( $var_name, $value ) {
		global $BUGSTER_STORAGE;
		if ( empty( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = '';
		}
		$BUGSTER_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'bugster_storage_get_array' ) ) {
	function bugster_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $BUGSTER_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $BUGSTER_STORAGE[ $var_name ][ $key ] ) ? $BUGSTER_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $BUGSTER_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $BUGSTER_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'bugster_storage_set_array' ) ) {
	function bugster_storage_set_array( $var_name, $key, $value ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$BUGSTER_STORAGE[ $var_name ][] = $value;
		} else {
			$BUGSTER_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'bugster_storage_set_array2' ) ) {
	function bugster_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ][ $key ] ) ) {
			$BUGSTER_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$BUGSTER_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$BUGSTER_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'bugster_storage_merge_array' ) ) {
	function bugster_storage_merge_array( $var_name, $key, $value ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$BUGSTER_STORAGE[ $var_name ] = array_merge( $BUGSTER_STORAGE[ $var_name ], $value );
		} else {
			$BUGSTER_STORAGE[ $var_name ][ $key ] = array_merge( $BUGSTER_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'bugster_storage_set_array_after' ) ) {
	function bugster_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			bugster_array_insert_after( $BUGSTER_STORAGE[ $var_name ], $after, $key );
		} else {
			bugster_array_insert_after( $BUGSTER_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'bugster_storage_set_array_before' ) ) {
	function bugster_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			bugster_array_insert_before( $BUGSTER_STORAGE[ $var_name ], $before, $key );
		} else {
			bugster_array_insert_before( $BUGSTER_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'bugster_storage_push_array' ) ) {
	function bugster_storage_push_array( $var_name, $key, $value ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $BUGSTER_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $BUGSTER_STORAGE[ $var_name ][ $key ] ) ) {
				$BUGSTER_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $BUGSTER_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'bugster_storage_pop_array' ) ) {
	function bugster_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $BUGSTER_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $BUGSTER_STORAGE[ $var_name ] ) && is_array( $BUGSTER_STORAGE[ $var_name ] ) && count( $BUGSTER_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $BUGSTER_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $BUGSTER_STORAGE[ $var_name ][ $key ] ) && is_array( $BUGSTER_STORAGE[ $var_name ][ $key ] ) && count( $BUGSTER_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $BUGSTER_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'bugster_storage_inc_array' ) ) {
	function bugster_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( empty( $BUGSTER_STORAGE[ $var_name ][ $key ] ) ) {
			$BUGSTER_STORAGE[ $var_name ][ $key ] = 0;
		}
		$BUGSTER_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'bugster_storage_concat_array' ) ) {
	function bugster_storage_concat_array( $var_name, $key, $value ) {
		global $BUGSTER_STORAGE;
		if ( ! isset( $BUGSTER_STORAGE[ $var_name ] ) ) {
			$BUGSTER_STORAGE[ $var_name ] = array();
		}
		if ( empty( $BUGSTER_STORAGE[ $var_name ][ $key ] ) ) {
			$BUGSTER_STORAGE[ $var_name ][ $key ] = '';
		}
		$BUGSTER_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'bugster_storage_call_obj_method' ) ) {
	function bugster_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $BUGSTER_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $BUGSTER_STORAGE[ $var_name ] ) ? $BUGSTER_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $BUGSTER_STORAGE[ $var_name ] ) ? $BUGSTER_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'bugster_storage_get_obj_property' ) ) {
	function bugster_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $BUGSTER_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $BUGSTER_STORAGE[ $var_name ]->$prop ) ? $BUGSTER_STORAGE[ $var_name ]->$prop : $default;
	}
}
