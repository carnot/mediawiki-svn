
// Set the global dismissNativeWarn flag:
_global['dismissNativeWarn'] = false;

/**
* Msg text is inherited from embedPlayer 
*/

/**
* ctrlBuilder object
*	@param the embedPlayer element we are targeting
*/
var ctrlBuilder = function( embedObj, options ) {
	return this.init( embedObj, options );
};

/*
 * controlsBuilder prototype:
 */
ctrlBuilder.prototype = {
	//Default Local values: 
	
	// Parent css Class name
	parentClass : 'mv-player',
	
	// Long string dsipaly of time value 
	long_time_disp: true,
	
	// If the options menu outside of player 
	external_options : true,
	
	// Default volume layout is "vertical"
	volume_layout : 'vertical',
	
	// Default control bar height is 29
	height:29,
	
	// Default Extended supported options is merged with embedObject supported types
	supports: {
	  'options':true,
	  'borders':true
	},
	
	/**
	* Initialization Object for the control builder
	*/ 
	init:function( embedObj, options ) {
		var _this = this;
		this.embedObj = embedObj;

		// Check for skin overrides for ctrlBuilder
		if ( _global[ embedObj.skin_name + 'Config'] ) {
			// Clone as to not override prototype: 	
			var _this = $j.extend( true, { }, this, _global[ embedObj.skin_name + 'Config'] );
			return _this;
		}
		// Return the ctrlBuilder Object: 
		return this;
	},
	
	/**
	* Get the controls html
	* @return {String} html output of controls
	*/
	getControls:function() {
		// Set up local pointer to the embedObj
		var embedObj = this.embedObj;
		// set up local ctrlBuilder
		var _this = this;

		js_log( 'f:controlsBuilder:: opt:' + this.options );
		this.id = ( embedObj.pc ) ? embedObj.pc.pp.id:embedObj.id;
		this.available_width = embedObj.playerPixelWidth();
		
		// Make pointer to the embedObj
		this.embedObj = embedObj;
		var _this = this;
		for ( var i in embedObj.supports ) {
			_this.supports[i] = embedObj.supports[i];
		};

		// Check for timed Text:
		if ( ( embedObj.roe || embedObj.wikiTitleKey ||
				( embedObj.media_element.checkForTextSource &&
				embedObj.media_element.checkForTextSource() )
			)  && embedObj.show_meta_link  ){
			this.supports['closed_captions'] = true;
		}


		// Append options to body (if not already there)
		if ( _this.body_options && $j( '#mv_vid_options_' + this.id ).length == 0 )
			$j( 'body' ).append( this.components['mv_embedded_options'].o( this ) );

		var o = '';
		for ( var i in this.components ) {
			if ( this.supports[i] ) {
				if ( this.available_width > this.components[i].w ) {
					// Special case with playhead don't add unless we have 60px
					if ( i == 'play_head' && this.available_width < 60 )
						continue;
					o += this.components[i].o( this  );
					this.available_width -= this.components[i].w;
				} else {
					js_log( 'not enough space for control component:' + i );
				}
			}
		}
		return o;
	},
	
	 /*
	 * addControlHooks
	 * to be run once controls are attached to the dom
	 * @param {jQueryObject} $target The target hook position
	 */
	addControlHooks:function( $target ) {
		// Set up local pointer to the embedObj
		var embedObj = this.embedObj;
		var _this = this;				

		if ( !$target )
			$target = $j( '#' + embedObj.id );
		
		
		// Add play hook:
		$target.find( '.play-btn,.play-btn-large' ).unbind().btnBind().click( function() {
			embedObj.play();
		} );

		// Add recommend firefox if we have non-native playback:
		if ( embedObj.doNativeWarningCheck() ) {
			$j( '#dc_' + embedObj.id ).hover(
				function() {
					if ( $j( '#gnp_' + embedObj.id ).length == 0 ) {
						var toppos = ( embedObj.instanceOf == 'mvPlayList' ) ? 25:10;
						$j( this ).append( '<div id="gnp_' + embedObj.id + '" class="ui-state-highlight ui-corner-all" ' +
							'style="position:absolute;display:none;background:#FFF;top:' + toppos + 'px;left:10px;right:10px;">' +
							gM( 'mwe-for_best_experience' ) +
						'<br><input id="ffwarn_' + embedObj.id + '" type=\"checkbox\">' +
							gM( 'mwe-do_not_warn_again' ) +
						'</div>' );
						$j( '#ffwarn_' + embedObj.id ).click( function() {
							if ( $j( this ).is( ':checked' ) ) {
								// set up a cookie for 7 days:
								$j.cookie( 'dismissNativeWarn', true, { expires: 7 } );
								// set the current instance
								_global['dismissNativeWarn'] = true;
								$j( '#gnp_' + embedObj.id ).fadeOut( 'slow' );
							} else {
								_global['adismissNativeWarn'] = false;
								$j.cookie( 'dismissNativeWarn', false );
							}

						} );
					}
					if ( ( $j.cookie( 'dismissNativeWarn' ) !== true ) &&
						_global['dismissNativeWarn'] === false  ) {
						$j( '#gnp_' + embedObj.id ).fadeIn( 'slow' );
					}
				},
				function() {
					$j( '#gnp_' + embedObj.id ).fadeOut( 'slow' );
				}
			);
		}

		if ( $j.browser.msie  &&  $j.browser.version <= 6 ) {
			$j( embedObj.id + ' .play-btn-large' ).pngFix();
		}


		// Captions binding:
		$target.find( '.timed-text' ).unbind().btnBind().click( function() {
			embedObj.showTextInterface();
		} );

		// Options binding:
		$target.find( '.options-btn' ).unbind().btnBind().click( function() {
			embedObj.doOptionsHTML();
		} );

		// Fullscreen binding:
		$target.find( '.fullscreen-btn' ).unbind().btnBind().click( function() {
			embedObj.fullscreen();
		} );
		
		// Playhead binding
		js_log( " should add slider binding: " + $target.find( '.play_head' ).length );
		$target.find( '.play_head' ).slider( {
			range: "min",
			value: 0,
			min: 0,
			max: 1000,
			start: function( event, ui ) {
				var id = ( embedObj.pc != null ) ? embedObj.pc.pp.id:embedObj.id;
				embedObj.userSlide = true;
				$j( id + ' .play-btn-large' ).fadeOut( 'fast' );
				// If playlist always start at 0
				embedObj.start_time_sec = ( embedObj.instanceOf == 'mvPlayList' ) ? 0:
								npt2seconds( embedObj.getTimeRange().split( '/' )[0] );
			},
			slide: function( event, ui ) {
				var perc = ui.value / 1000;
				embedObj.jump_time = seconds2npt( parseFloat( parseFloat( embedObj.getDuration() ) * perc ) + embedObj.start_time_sec );
				// js_log('perc:' + perc + ' * ' + embedObj.getDuration() + ' jt:'+  this.jump_time);
				if ( _this.long_time_disp ) {
					embedObj.setStatus( gM( 'mwe-seek_to', embedObj.jump_time ) );
				} else {
					embedObj.setStatus( embedObj.jump_time );
				}
				// Update the thumbnail / frame
				if ( embedObj.isPlaying == false ) {
					embedObj.updateThumbPerc( perc );
				}
			},
			change:function( event, ui ) {
				// Only run the onChange event if done by a user slide 
				// (otherwise it runs times it should not)
				if ( embedObj.userSlide ) {
					embedObj.userSlide = false;
					embedObj.seeking = true;
					// Stop the monitor timer (if we can)				
					embedObj.stopMonitor();

					var perc = ui.value / 1000;
					// set seek time (in case we have to do a url seek)
					embedObj.seek_time_sec = npt2seconds( embedObj.jump_time, true );
					js_log( 'do jump to: ' + embedObj.jump_time + ' perc:' + perc + ' sts:' + embedObj.seek_time_sec );
					embedObj.setStatus( gM( 'mwe-seeking' ) );
					embedObj.doSeek( perc );
				}
			}
		} );
		
		// Up the z-index of the default status indicator:
		$target.find( '.play_head .ui-slider-handle' ).css( 'z-index', 4 );
		$target.find( '.play_head .ui-slider-range' ).addClass( 'ui-corner-all' ).css( 'z-index', 2 );
		
		// Extended class list for jQuery ui themeing 
		//(we can probably refactor this with custom buffering highlighter)
		$target.find( '.play_head' ).append( this.getBufferHtml() );
			
		$opt = $j( '#mv_vid_options_' + embedObj.id );
		
		// videoOptions ... @@todo should be merged with something more like kskin.js:
		$opt.find( '.vo_selection' ).click( function() {
			embedObj.displayHTML();
			embedObj.showPlayerSelect( $target.find( '.videoOptionsComplete' ) );
			$opt.hide();
			return false;
		} );
		
		$opt.find( '.vo_download' ).click( function() {
			embedObj.displayHTML();
			embedObj.showDownload( $target.find( '.videoOptionsComplete' ) );
			$opt.hide();
			return false;
		} );
		
		$opt.find( '.vo_showcode' ).click( function() {
			embedObj.displayHTML();
			embedObj.showShare( $target.find( '.videoOptionsComplete' ) );
			$opt.hide();
			return false;
		} );
		this.doVolumeBinding();
		
		// Check if we have any custom skin Bindings to run
		if ( this.addSkinControlBindings && typeof( this.addSkinControlBindings ) == 'function' )
			this.addSkinControlBindings();
	},
	/*
	* Binds the volume controls
	*/
	doVolumeBinding:function() {
		var embedObj = this.embedObj;
		var _this = this;
		var $target = $j( '#' + embedObj.id );
		$target.find( '.volume_control' ).unbind().btnBind().click( function() {
			js_log( 'clicked volume control' );
			$j( '#' + embedObj.id ).get( 0 ).toggleMute();
		} );
		
		// Add vertical volume display hover
		if ( this.volume_layout == 'vertical' ) {
			// Default volume binding:
			var hoverOverDelay = false;
			var $targetvol = $target.find( '.vol_container' );
			$target.find( '.volume_control' ).hover(
				function() {
					$targetvol.addClass( 'vol_container_top' );
					// Set to "below" if playing and embedType != native
					if ( embedObj && embedObj.isPlaying && embedObj.isPlaying() && !embedObj.supports['overlays'] ) {
						$targetvol.removeClass( 'vol_container_top' ).addClass( 'vol_container_below' );
					}
					$targetvol.fadeIn( 'fast' );
					hoverOverDelay = true;
				},
				function() {
					hoverOverDelay = false;
					setTimeout( function doHideVolume() {
						if ( !hoverOverDelay ) {
							$targetvol.fadeOut( 'fast' );
						}
					}, 500 );
				}
			);
		}
		
		// Setup play-head slider:
		var sliderConf = {
			range: "min",
			value: 80,
			min: 0,
			max: 100,
			slide: function( event, ui ) {
				var perc = ui.value / 100;
				// js_log('update volume:' + perc);
				embedObj.updateVolumen( perc );
			},
			change:function( event, ui ) {
				var perc = ui.value / 100;
				if ( perc == 0 ) {
					$target.find( '.volume_control span' ).removeClass( 'ui-icon-volume-on' ).addClass( 'ui-icon-volume-off' );
				} else {
					$target.find( '.volume_control span' ).removeClass( 'ui-icon-volume-off' ).addClass( 'ui-icon-volume-on' );
				}
				var perc = ui.value / 100;
				embedObj.updateVolumen( perc );
			}
		}
		
		if ( this.volume_layout == 'vertical' )
			sliderConf['orientation'] = "vertical";
		
		$target.find( '.volume-slider' ).slider( sliderConf );
	},
	
	/** 
	* Get the Buffer Html that overlays the playhead
	*/
	getBufferHtml:function() {
		return '<div class="ui-slider-range ui-slider-range-min ui-widget-header ' +
				'ui-state-highlight ui-corner-all ' +
				'mv_buffer" style="width:0px;height:100%;z-index:1;top:0px" />';
	},
	
	/**
	* Accessor to get component
	*
	* @param {String} compoent Component key to grab html output
	*/
	getComponent:function( component ) {
		if ( this.components[ component ] ) {
			return this.components[ component ].o( this );
		} else {
			return false;
		}
	},
	
	/**
	* Components Object
	* Take in the embedObj and return some html for the given component.
	*
	* components can be overwritten by skin javascript
	*/
	components: {
		/* Borders */ 
		'borders': {
			'w':8,
			'o':function( ctrlObj ) {
				return	'';
			}
		},
		/*
		* The large play button in center of the player
		*/
		'play-btn-large': {
			'w' : 130,
			'h' : 96,
			'o':function( ctrlObj ) {
				// Get dynamic position for big play button
				return $j( '<div/>' ).attr( {
								'title'	: gM( 'mwe-play_clip' ),
								'class'	: "ui-state-default play-btn-large"
							} )
							.css( {
								'left' 	: ( ( ctrlObj.embedObj.playerPixelWidth() - this.w ) / 2 ),
								'top'	: ( ( ctrlObj.embedObj.playerPixelHeight() - this.h ) / 2 )
							} )
							.wrap( '<div/>' ).parent().html();
			}
		},
		/*
		* The options for the player, includes player selection, 
		* download, and share options
		*/
		'mv_embedded_options': {
			'w':0,
			'o':function( ctrlObj ) {
				var o = '<div id="mv_vid_options_' + ctrlObj.id + '" class="videoOptions">' +
				'<div class="videoOptionsTop"></div>' +
				'<div class="videoOptionsBox">' +
				'<div class="block">' +
					'<h6>Video Options</h6>' +
				'</div>' +
					'<div class="block">' +
						'<p class="short_match vo_selection"><a href="#"><span>' + gM( 'mwe-chose_player' ) + '</span></a></p>' +
						'<p class="short_match vo_download"><a href="#"><span>' + gM( 'mwe-download' ) + '</span></a></p>' +
						'<p class="short_match vo_showcode"><a href="#"><span>' + gM( 'mwe-share' ) + '</span></a></p>';

					// link to the stream page if we are not already there:
					if ( ( ctrlObj.embedObj.roe || ctrlObj.embedObj.linkback ) && typeof mv_stream_interface == 'undefined' )
						o += '<p class="short_match"><a href="javascript:$j(\'#' + ctrlObj.id + '\').get(0).doLinkBack()"><span><strong>Source Page</strong></span></a></p>';

				o += '</div>' +
				'</div><!--videoOptionsInner-->' +
					'<div class="videoOptionsBot"></div>' +
				'</div><!--videoOptions-->';
				return o;
			}
		},
		/*
		* The fullscreen button for displaying the video fullscreen
		*/
		'fullscreen': {
			'w':20,
			'o':function( ctrlObj ) {
				return '<div title="' + gM( 'mwe-player_fullscreen' ) + '" class="ui-state-default ui-corner-all ui-icon_link rButton fullscreen-btn">' +
							'<span class="ui-icon ui-icon-arrow-4-diag"></span>' +
						'</div>'
			}
		},
		/*
		* The options button, diffrent from the options menu above
		*/
		'options': {
			'w':26,
			'o':function( ctrlObj ) {
				return '<div title="' + gM( 'mwe-player_options' ) + '" class="ui-state-default ui-corner-all ui-icon_link rButton options-btn">' +
							'<span class="ui-icon ui-icon-wrench"></span>' +
						'</div>';
			}
		},
		/*
		* The pause button
		*/
		'pause': {
			'w':24,
			'o':function( ctrlObj ) {
				return '<div title="' + gM( 'mwe-play_clip' ) + '" class="ui-state-default ui-corner-all ui-icon_link lButton play-btn">' +
							'<span class="ui-icon ui-icon-play"/>' +
						'</div>';
			}
		},
		/*
		* The closed captions button
		*/
		'closed_captions': {
			'w':23,
			'o':function( ctrlObj ) {
				return '<div title="' + gM( 'mwe-closed_captions' ) + '" class="ui-state-default ui-corner-all ui-icon_link rButton timed-text">' +
							'<span class="ui-icon ui-icon-comment"></span>' +
						'</div>'
			}
		},
		/*
		* The volume control interface html
		*/
		'volume_control': {
			'w':23,
			'o':function( ctrlObj ) {
				var o = '';
				if ( ctrlObj.volume_layout == 'horizontal' )
					o += '<div class="ui-slider ui-slider-horizontal rButton volume-slider"></div>';
					
				o += '<div title="' + gM( 'mwe-volume_control' ) + '" class="ui-state-default ui-corner-all ui-icon_link rButton volume_control">' +
						'<span class="ui-icon ui-icon-volume-on"></span>';
						
				if ( ctrlObj.volume_layout == 'vertical' ) {
					o += '<div style="position:absolute;display:none;left:0px;" class="vol_container ui-corner-all">' +
							'<div class="volume-slider" ></div>' +
						'</div>';
				}
				o += '</div>';
				return o;
			}
		},
		/*
		* The time dispaly area
		*/
		'time_display': {
			'w':90,
			'o':function( ctrlObj ) {
				return '<div class="ui-widget time-disp">' + ctrlObj.embedObj.getTimeRange() + '</div>';
			}
		},
		/*
		* The playhead html
		*/
		'play_head': {
			'w':0, // special case (takes up remaining space)
			'o':function( ctrlObj ) {
				return '<div class="play_head" style="width: ' + ( ctrlObj.available_width - 34 ) + 'px;"></div>';
			}
		}
	}
};
