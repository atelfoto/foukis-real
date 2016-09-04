+function($){"use strict";function Plugin(option){return this.each(function(){var $this=$(this),data=$this.data("bs.toggle"),options="object"==typeof option&&option;data||$this.data("bs.toggle",data=new Toggle(this,options)),"string"==typeof option&&data[option]&&data[option]()})}var Toggle=function(element,options){this.$element=$(element),this.options=$.extend({},this.defaults(),options),this.render()};Toggle.VERSION="2.2.0",Toggle.DEFAULTS={on:"On",off:"Off",onstyle:"primary",offstyle:"default",size:"normal",style:"",width:null,height:null},Toggle.prototype.defaults=function(){return{on:this.$element.attr("data-on")||Toggle.DEFAULTS.on,off:this.$element.attr("data-off")||Toggle.DEFAULTS.off,onstyle:this.$element.attr("data-onstyle")||Toggle.DEFAULTS.onstyle,offstyle:this.$element.attr("data-offstyle")||Toggle.DEFAULTS.offstyle,size:this.$element.attr("data-size")||Toggle.DEFAULTS.size,style:this.$element.attr("data-style")||Toggle.DEFAULTS.style,width:this.$element.attr("data-width")||Toggle.DEFAULTS.width,height:this.$element.attr("data-height")||Toggle.DEFAULTS.height}},Toggle.prototype.render=function(){this._onstyle="btn-"+this.options.onstyle,this._offstyle="btn-"+this.options.offstyle;var size="large"===this.options.size?"btn-lg":"small"===this.options.size?"btn-sm":"mini"===this.options.size?"btn-xs":"",$toggleOn=$('<label class="btn">').html(this.options.on).addClass(this._onstyle+" "+size),$toggleOff=$('<label class="btn">').html(this.options.off).addClass(this._offstyle+" "+size+" active"),$toggleHandle=$('<span class="toggle-handle btn btn-default">').addClass(size),$toggleGroup=$('<div class="toggle-group">').append($toggleOn,$toggleOff,$toggleHandle),$toggle=$('<div class="toggle btn" data-toggle="toggle">').addClass(this.$element.prop("checked")?this._onstyle:this._offstyle+" off").addClass(size).addClass(this.options.style);this.$element.wrap($toggle),$.extend(this,{$toggle:this.$element.parent(),$toggleOn:$toggleOn,$toggleOff:$toggleOff,$toggleGroup:$toggleGroup}),this.$toggle.append($toggleGroup);var width=this.options.width||Math.max($toggleOn.outerWidth(),$toggleOff.outerWidth())+$toggleHandle.outerWidth()/2,height=this.options.height||Math.max($toggleOn.outerHeight(),$toggleOff.outerHeight());$toggleOn.addClass("toggle-on"),$toggleOff.addClass("toggle-off"),this.$toggle.css({width:width,height:height}),this.options.height&&($toggleOn.css("line-height",$toggleOn.height()+"px"),$toggleOff.css("line-height",$toggleOff.height()+"px")),this.update(!0),this.trigger(!0)},Toggle.prototype.toggle=function(){this.$element.prop("checked")?this.off():this.on()},Toggle.prototype.on=function(silent){return this.$element.prop("disabled")?!1:(this.$toggle.removeClass(this._offstyle+" off").addClass(this._onstyle),this.$element.prop("checked",!0),void(silent||this.trigger()))},Toggle.prototype.off=function(silent){return this.$element.prop("disabled")?!1:(this.$toggle.removeClass(this._onstyle).addClass(this._offstyle+" off"),this.$element.prop("checked",!1),void(silent||this.trigger()))},Toggle.prototype.enable=function(){this.$toggle.removeAttr("disabled"),this.$element.prop("disabled",!1)},Toggle.prototype.disable=function(){this.$toggle.attr("disabled","disabled"),this.$element.prop("disabled",!0)},Toggle.prototype.update=function(silent){this.$element.prop("disabled")?this.disable():this.enable(),this.$element.prop("checked")?this.on(silent):this.off(silent)},Toggle.prototype.trigger=function(silent){this.$element.off("change.bs.toggle"),silent||this.$element.change(),this.$element.on("change.bs.toggle",$.proxy(function(){this.update()},this))},Toggle.prototype.destroy=function(){this.$element.off("change.bs.toggle"),this.$toggleGroup.remove(),this.$element.removeData("bs.toggle"),this.$element.unwrap()};var old=$.fn.bootstrapToggle;$.fn.bootstrapToggle=Plugin,$.fn.bootstrapToggle.Constructor=Toggle,$.fn.toggle.noConflict=function(){return $.fn.bootstrapToggle=old,this},$(function(){$("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle()}),$(document).on("click.bs.toggle","div[data-toggle^=toggle]",function(e){var $checkbox=$(this).find("input[type=checkbox]");$checkbox.bootstrapToggle("toggle"),e.preventDefault()})}(jQuery);