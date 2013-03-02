(function($)
{
	$.fn.dropDownMenu = function(options)
	{

		var defaults = {
			data:       [],
			event:      'click',
			leftOffset: 0,
			topOffset:  2,
			closeTime1: 1000,
			closeTime2: 2000,
			showTitle:  false
		}

        var options = $.extend(defaults, options);

		return this.each(function() {

			var sourceElement = $(this);
			var html          = '';
			var position      = null;
			var closeTimeout  = null;

			function assignEventToSourceElement()
			{
				if (sourceElement)
				{
					sourceElement.bind(options.event, function() {
						html.slideDown();
						clearTimeout(closeTimeout);
						hideAndCloseMenu(options.closeTime2);
					});
				}
			}

			function createMenuHtml()
			{
				html = $('<ul></ul>');
				html.attr('class', 'dropDownMenu');

				var elLI;

				for(var x = 0; x < options.data.length; x++)
				{
					var title = "";

					if (options.showTitle == true)
					{
						title = " title=" + options.data[x].text + " ";
					}

					elLI = $('<li></li>');
					elA  = $('<a href="' + options.data[x].link + '"' + title + '>' + options.data[x].text + '</a>');

					elA.mouseover(function() {
						$(this).addClass("dropDownMenuHover");
					});

					elA.mouseout(function() {
						$(this).removeClass("dropDownMenuHover");
					});

					elLI.append(elA);
					html.append(elLI);
				}

				position = sourceElement.position();

				html.css('left', position.left + options.leftOffset);
				html.css('top', position.top + sourceElement.height() + options.topOffset);
				html.hide();

				html.mouseover(function(){
					clearTimeout(closeTimeout);
				});

				html.mouseout(function(){
					hideAndCloseMenu(options.closeTime1);
				});

				$("body").append(html);
			}

			function hideAndCloseMenu(time)
			{
				closeTimeout = setTimeout(function() {
					close();
				}, time);
			}

			function close()
			{
				html.slideUp();
			}

			createMenuHtml();
			assignEventToSourceElement();
		});

	}
})(jQuery);