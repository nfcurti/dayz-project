<?php
// source: /Users/juancurti/Documents/Project DayZ/dayz-map/app/templates/Front/home.latte

use Latte\Runtime as LR;

class Templatec471107cc0 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'content' => 'html',
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>

<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
?>

<?php
		$this->renderBlock('head', get_defined_vars());
?>

<?php
		$this->renderBlock('scripts', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['markerId'])) trigger_error('Variable $markerId overwritten in foreach on line 336');
		if (isset($this->params['markerOptions'])) trigger_error('Variable $markerOptions overwritten in foreach on line 336');
		if (isset($this->params['id'])) trigger_error('Variable $id overwritten in foreach on line 341');
		if (isset($this->params['baseLayer'])) trigger_error('Variable $baseLayer overwritten in foreach on line 341');
		$this->parentName = "../@layout.latte";
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
	<div id="map"></div>
	<div class="leaflet-control-container">
		<div class="leaflet-top leaflet-right">
			<div class="leaflet-control">
				<button class="btn btn-sm btn-primary" onclick="$('#controls-left').toggle('slide', { direction: 'left' }, 300);$('#controls-right').toggle('slide', { direction: 'right' }, 300);">
					<i class="fa fa-bars"></i>
				</button>
			</div>
		</div>
		<div class="leaflet-top leaflet-right" id="controls-right" style="padding-top: 40px">
<?php
		if ($service->steam->login->enabled && $service->limits->extensions->steamAccount) {
?>			<div class="leaflet-control leaflet-control-custom rounded">
<?php
			if ($Steam->id) {
?>				<div>
					<table>
						<tr>
							<td>
								<img class="rounded-circle" src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($Steam->avatar_icon)) /* line 36 */ ?>" alt="<?php
				echo LR\Filters::escapeHtmlAttr($Steam->nickname) /* line 36 */ ?>'s Avatar">
							</td>
							<td class="pl-1 pr-2">
								<?php echo LR\Filters::escapeHtmlText($Steam->nickname) /* line 39 */ ?>

							</td>
							<td class="pl-1">
								<a class="btn btn-sm btn-warning" href="javascript:redirectToAction('steamlogout');" title="Sign out">
									<i class="fa fa-sign-out-alt"></i>
								</a>
							</td>
						</tr>
					</table>
				</div>
<?php
			}
			if (!$Steam->id) {
?>				<div>
					<a href="javascript:redirectToAction('steamlogin-init');">
						<img alt="Sign in" src="https://steamcommunity-a.akamaihd.net/public/images/signinthroughsteam/sits_02.png">
					</a>
				</div>
<?php
			}
?>
			</div>
<?php
		}
		if ($service->limits->extensions->server) {
?>			<select class="leaflet-control form-control" id="server">
				<option selected disabled>-- Select Server --</option>
			</select>
<?php
		}
		if ($service->limits->extensions->log) {
?>			<div class="leaflet-control input-group">
				<select class="form-control" id="log" disabled>
					<option selected disabled>-- Select Log --</option>
					<optgroup label="DONOR" id="log-group">
						<option>DayZServer_x64_2019_01_11_200416631.ADM</option>
					</optgroup>
				</select>
				<div class="input-group-append">
					<button type="button" class="btn btn-primary" onclick="$('#log').change();">
						<i class="fa fa-sync"></i>
					</button>
				</div>
			</div>
<?php
		}
		if ($service->limits->extensions->stats) {
?>			<div class="leaflet-control leaflet-control-custom rounded">
				<table>
					<tbody>
					<tr>
						<th class="pr-2">Event count</th>
						<td id="event-count">0</td>
					</tr>
					<tr>
						<th class="pr-2">Visible events</th>
						<td id="event-count-filtered">0</td>
					</tr>
					<tr>
						<th class="pr-2">Log from</th>
						<td id="event-time-from">Unknown</td>
					</tr>
					<tr>
						<th class="pr-2">Log to</th>
						<td id="event-time-to">Unknown</td>
					</tr>
					</tbody>
				</table>
			</div>
<?php
		}
		if ($service->limits->extensions->status) {
?>			<div class="leaflet-control leaflet-control-custom rounded p-0" style="font-size: 12px">
				<pre class="p-1 m-0 text-right" id="status-bar" style="display: none;"></pre>
			</div>
<?php
		}
?>
		</div>
		<div class="leaflet-bottom leaflet-left" id="controls-left">
<?php
		if ($service->limits->filters->steamid) {
?>			<div class="leaflet-control input-group">
				<input type="text" title="SteamID64" placeholder="76561198055158908" class=" form-control" id="steamid" value="<?php
			echo LR\Filters::escapeHtmlAttr(@$_GET['steamid64']) /* line 99 */ ?>" disabled>
				<div class="input-group-append">
					<button type="button" class="btn btn-danger" onclick="$('#steamid').val('').keyup();">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>
<?php
		}
		if ($service->limits->filters->time) {
?>			<div class="leaflet-control input-group">
				<select class="form-control" id="time-from" disabled>
					<option selected>Select log first.</option>
				</select>
				<select class="form-control" id="time-to" disabled>
					<option selected>Select log first.</option>
				</select>
				<div class="input-group-append">
					<button type="button" class="btn btn-danger" onclick="time_filter__reset();">
						<i class="fa fa-times"></i>
					</button>
				</div>
			</div>
<?php
		}
		if (
		$service->limits->extensions->visuals->connectEvents
		|| $service->limits->extensions->visuals->additionalEventData) {
?>			<div class="leaflet-control leaflet-control-custom rounded">
<?php
			if ($service->limits->extensions->visuals->connectEvents) {
?>				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="connectEvents" value="1"
					       onchange="displayEvents(); setUrlParam('connect_events', $('#connectEvents:checked').val());" <?php
				if (@$_GET['connect_events'] == 1) {
					?>checked<?php
				}
?>>
					<label class="custom-control-label" for="connectEvents">Visually connect player events</label>
				</div>
<?php
			}
			if ($service->limits->extensions->visuals->additionalEventData) {
?>				<div class="custom-control custom-checkbox">
					<input type="checkbox" class="custom-control-input" id="visualizeAdditionalData" value="1"
					       onchange="displayEvents(); setUrlParam('visualize_additional_data', $('#visualizeAdditionalData:checked').val());" <?php
				if (@$_GET['visualize_additional_data'] == 1) {
					?>checked<?php
				}
?>>
					<label class="custom-control-label" for="visualizeAdditionalData">Visualize additional event data</label>
				</div>
<?php
			}
?>
			</div>
<?php
		}
		if ($service->limits->filters->type) {
?>			<div class="leaflet-control leaflet-control-custom rounded">
				<select style="height: 140px" class="pl-1 pr-2 form-control" id="event-types" multiple>
					<option disabled>Select log first.</option>
				</select>
				<button type="button" class="btn btn-sm btn-danger w-100 mt-1" onclick="event_types__reset();">
					<i class="fa fa-times"></i>
				</button>
			</div>
<?php
		}
?>
		</div>
	</div>
<?php
	}


	function blockHead($_args)
	{
		extract($_args);
?>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.css" rel="stylesheet" integrity="sha256-YR4HrDE479EpYZgeTkQfgVJq08+277UXxMLbi/YP69o=" crossorigin="anonymous">
	<link href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" rel="stylesheet" crossorigin="anonymous">
	<link href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" rel="stylesheet" crossorigin="anonymous">
	<style>
		body {
			margin: 0;
			padding: 0;
			overflow: hidden;
		}

		#map {
			height: 100vh;
			background: #222222;
		}

		.leaflet-popup-content h1,
		.leaflet-popup-content h2,
		.leaflet-popup-content h3,
		.leaflet-popup-content h4,
		.leaflet-popup-content h5,
		.leaflet-popup-content h6 {
			margin-bottom: 3px;
		}

		.leaflet-control-custom {
			background: #FFF;
			padding: 8px;
		}
	</style>
<?php
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
	<script type="text/javascript">
<?php
		if ($service->limits->filters->steamid) {
			?>		var steamid64 = <?php echo LR\Filters::escapeJs(@$_GET['steamid64']) /* line 180 */ ?>;
		$( "#steamid" ).on('keyup', function ( event ) {
			var $this = $( this );
			if (!$this.val())
				steamid64 = null;
			else
				steamid64 = $this.val();

			if (event.key === "Enter" || typeof event.key === "undefined")
			{
				setUrlParam('steamid64', steamid64);
				filterEvents();
				displayEvents();
			}
		});
<?php
		}
?>

		var server = <?php echo LR\Filters::escapeJs(@$_GET['server']) /* line 197 */ ?>;
		$( "#server" ).on('change', function() {
			var $this = $( this );
			server = $this.val();
			setUrlParam('server', $this.val());
<?php
		if ($service->limits->extensions->log) {
?>
			loadLogfiles();
<?php
		}
		else {
?>
			loadZones();
			loadEvents();
<?php
		}
?>
		});

		var log = <?php echo LR\Filters::escapeJs(@$_GET['log']) /* line 210 */ ?>;
		$( "#log" ).on('change', function(event) {
			var $this = $( this );
			log = $this.val();
			if (event.eventPhase)
			{
				// Real change by user
				time_from = null;
				time_to = null;
			}
			setUrlParam('log', $this.val());
			loadZones();
			loadEvents();
		});

		var time_from = <?php echo LR\Filters::escapeJs(@$_GET['time_from']) /* line 225 */ ?>, time_from_default;
		var time_to = <?php echo LR\Filters::escapeJs(@$_GET['time_to']) /* line 226 */ ?>, time_to_default;
<?php
		if ($service->limits->filters->time) {
?>
		$("#time-from").on('change', function () {
			var $this = $( this );
			if (!$this.val())
				$this.val(time_from_default);
			$("#time-to option").each(function (key, opt) {
				var $opt = $(opt);
				if (parseInt($opt.val()) <= parseInt($this.val()))
					$opt.attr("disabled", "disabled");
				else
					$opt.removeAttr("disabled");
			});
			if ($this.val() == time_from_default)
				setUrlParam('time_from', null);
			else
				setUrlParam('time_from', $this.val());
			filterEvents();
			displayEvents();
		});

		$("#time-to").on('change', function () {
			var $this = $( this );
			if (!$this.val())
				$this.val(time_to_default);
			$("#time-from option").each(function (key, opt) {
				var $opt = $(opt);
				if (parseInt($opt.val()) >= parseInt($this.val()))
					$opt.attr("disabled", "disabled");
				else
					$opt.removeAttr("disabled");
			});
			if ($this.val() == time_to_default)
				setUrlParam('time_to', null);
			else
				setUrlParam('time_to', $this.val());
			filterEvents();
			displayEvents();
		});

		function time_filter__reset() {
			$('#time-from').val(time_from_default).change();
			$('#time-to').val(time_to_default).change();
		}
<?php
		}
?>

<?php
		if ($service->limits->filters->type) {
			?>		var event_types<?php
			if (isset($_GET['event_types'])) {
				?> = JSON.parse(atob(<?php echo LR\Filters::escapeJs($_GET['event_types']) /* line 273 */ ?>))<?php
			}
?>;
		$("#event-types").on('change', function () {
			var $this = $( this );
			event_types = $this.val();
			setUrlParam('event_types', event_types
				? btoa(JSON.stringify(event_types))
				: null);
			filterEvents();
			displayEvents();
		});

		function event_types__reset() {
			$('#event-types option').prop('selected', true);
			$('#event-types').change();
			event_types = null;
			setUrlParam('event_types', event_types);
		}
<?php
		}
?>

		var statusBarTimeout;
		function showStatusMessage(message, timeout) {
<?php
		if ($service->limits->extensions->status) {
?>
			var $statusBar = $("#status-bar");
			if (statusBarTimeout)
			{
				clearTimeout(statusBarTimeout);
				$statusBar.append("\n");
			}
			$statusBar.show().append(message);
			statusBarTimeout = setTimeout(function() {
				statusBarTimeout = null;
				$statusBar.hide().html("");
			}, timeout || 3000);
<?php
		}
?>
		}

		function redirectToAction( action ) {
			const searchParams = new URLSearchParams(window.location.search);
			searchParams.set('action', action);
			window.location.href = window.location.origin + window.location.pathname + "?" + searchParams.toString();
		}
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.4.0/leaflet.js" integrity="sha256-6BZRSENq3kxI4YYBDqJ23xg0r1GwTHEpvp3okdaIqBw=" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js" crossorigin="anonymous"></script>
	<script type="text/javascript">
		var width = <?php echo LR\Filters::escapeJs($map->settings->dimensions->referenceMap->width) /* line 318 */ ?>,
			height = <?php echo LR\Filters::escapeJs($map->settings->dimensions->referenceMap->height) /* line 319 */ ?>;

		var mapWidth = <?php echo LR\Filters::escapeJs($map->settings->dimensions->leafletMap->width) /* line 321 */ ?>,
			mapHeight = <?php echo LR\Filters::escapeJs($map->settings->dimensions->leafletMap->height) /* line 322 */ ?>;

		var eventSettings = JSON.parse(<?php echo LR\Filters::escapeJs(json_encode($map->events)) /* line 324 */ ?>);

		// https://github.com/pointhi/leaflet-color-markers
		var markerTypeDefaults = {
			iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
			shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
			iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -34],
			shadowSize: [41, 41],
		};
		var markerTypes = {};
<?php
		$iterations = 0;
		foreach ($map->markers as $markerId => $markerOptions) {
			?>		markerTypes[<?php echo LR\Filters::escapeJs($markerId) /* line 337 */ ?>] = new L.Icon(Object.assign(markerTypeDefaults, JSON.parse(<?php
			echo LR\Filters::escapeJs(json_encode($markerOptions)) /* line 337 */ ?>)));
<?php
			$iterations++;
		}
?>

		var baseLayers = {};
<?php
		$iterations = 0;
		foreach ($map->baseLayers as $id => $baseLayer) {
			?>		baseLayers[<?php echo LR\Filters::escapeJs($id) /* line 342 */ ?>] = L.tileLayer(<?php echo LR\Filters::escapeJs($baseLayer->source) /* line 342 */ ?>, JSON.parse(<?php
			echo LR\Filters::escapeJs(json_encode($baseLayer->options)) /* line 342 */ ?>));
		baseLayers[<?php echo LR\Filters::escapeJs($id) /* line 343 */ ?>].getTileUrl = function (coords) {
			coords.y = -coords.y - 1;
			return L.TileLayer.prototype.getTileUrl.bind(baseLayers[<?php echo LR\Filters::escapeJs($id) /* line 346 */ ?>])(coords);
		};
<?php
			$iterations++;
		}
?>

		var map = L.map('map', Object.assign(JSON.parse(<?php echo LR\Filters::escapeJs(json_encode($map->settings->options)) /* line 350 */ ?>), {
			crs: L.CRS[<?php echo LR\Filters::escapeJs($map->settings->options->crs) /* line 351 */ ?>],
		}));
		baseLayers[<?php echo LR\Filters::escapeJs($map->settings->defaults->baseLayer) /* line 353 */ ?>].addTo(map);
		L.control.layers(baseLayers, null, {
			position: 'topleft'
		}).addTo(map);
		//map.setMaxBounds(map.getBounds());

		//  Right click
		map.on("contextmenu", function (event) {
			console.log("Coordinates: %s => %o, %o", event.latlng.toString(), getXY(event.latlng), getLatLng(getXY(event.latlng)[0], getXY(event.latlng)[1]));
			//L.marker(event.latlng).addTo(map);
		});

		// Zoom, move
		map.on("zoomend moveend", function (event) {
			setUrlParam('map_zoom', map.getZoom());
			var c = map.getCenter();
			setUrlParam('map_x', c.lat);
			setUrlParam('map_y', c.lng);
		});

		function getXY(latLng) {
			var x = latLng.lng;
			var y = latLng.lat;
			return [x, y];
		}

		function getLatLngFromPosition(p) {
			return getLatLng(p.x, p.z, p.y);
		}

		function getLatLng(x, y, z) {
			var lng = x / width;
			lng *= mapWidth;
			var lat = y / height;
			lat *= mapHeight;
			return new L.LatLng(lat, lng, z);
		}

		// +-15m filter
		function setTimeFilter(from, min_diff) {
			var low = from - min_diff * 60;
			low = Math.floor(low / <?php echo LR\Filters::escapeJs($service->limits->filters->timeIntervals) /* line 394 */ ?>) * <?php
		echo LR\Filters::escapeJs($service->limits->filters->timeIntervals) /* line 394 */ ?>;

			var high = from + min_diff * 60;
			high = Math.ceil(high / <?php echo LR\Filters::escapeJs($service->limits->filters->timeIntervals) /* line 397 */ ?>) * <?php
		echo LR\Filters::escapeJs($service->limits->filters->timeIntervals) /* line 397 */ ?>;

			$( "#time-from" ).val(low || time_from_default).change();
			$( "#time-to" ).val(high || time_to_default).change();
		}

		function timeFilter(filterEntries) {
			var $timeFrom = $( "#time-from" ).html("");
			var $timeTo = $( "#time-to" ).html("");

			for (var timestamp in filterEntries)
			{
				if (!filterEntries.hasOwnProperty(timestamp))
					continue;

				$timeFrom.append($("<option>").val(timestamp).text(filterEntries[timestamp]));
				$timeTo.append($("<option>").val(timestamp).text(filterEntries[timestamp]));
			}

			$timeFrom.val(time_from || time_from_default).change();
			$timeTo.val(time_to || time_to_default).change();
		}

		function loadLogfiles() {
			$.get(<?php echo LR\Filters::escapeJs($service->endpoints->logs) /* line 421 */ ?>, { server: server }).done(function (data) {
				var logs = JSON.parse(data);
				if (logs.error)
				{
					showStatusMessage("Failed to load logfiles (message: '" + logs.message + "')", 15000);
					return;
				}
				processLogfiles(logs);
			}).fail(function (jqXHR, textStatus, errorThrown) {
				showStatusMessage("Failed to load logfiles (message: '" + textStatus + "')", 15000);
			});
		}

		function processLogfiles( logs ) {
			var $group = $( "#log-group" ).attr("label", logs.server.name).html("");
			for (var fileid in logs.files)
			{
				if (!logs.files.hasOwnProperty(fileid))
					continue;

				var file = logs.files[fileid];
				$group.append($("<option>").attr("value", fileid).text(file));
			}
			var $log = $( "#log" ).removeAttr("disabled");
			$log.val(log);
			if ($log.val() == null)
			{
				// Select current log if no other log has been selected
				$log.val("DayZServer_x64.ADM");
			}
			$log.change();
		}

		var zones = [];
		var zonePolygons = [];
		function loadZones() {
			showStatusMessage("Loading zones...");
			for (var i = 0; i < zonePolygons.length; i++) {
				map.removeLayer(zonePolygons[i]);
			}
			zonePolygons = [];

			$.get(<?php echo LR\Filters::escapeJs($service->endpoints->zones) /* line 463 */ ?>, { server: server }).done(function (data) {
				var result = JSON.parse(data);
				if (result.error)
				{
					showStatusMessage("Failed to load logfiles (message: '" + result.message + "')", 15000);
					return;
				}
				processZones(result);
			}).fail(function (jqXHR, textStatus, errorThrown) {
				showStatusMessage("Failed to load map zones (message: '" + textStatus + "')", 15000);
			});
		}

		function processZones( data )
		{
			for (var zoneName in data.zones)
			{
				if (!data.zones.hasOwnProperty(zoneName))
					continue;

				var z = zones[zoneName] = data.zones[zoneName];
				var latLngs = [];
				for (var i = 0; i < z.bounds.length; i++)
					latLngs.push(getLatLng(z.bounds[i][0], z.bounds[i][1], 0));

				var polygon = L.polygon(latLngs, z.options);

				var tooltipContent = z.tooltip.content || zoneName;
				polygon.bindTooltip(tooltipContent);

				var popupContent = z.popup.content;
				if (popupContent)
				{
					polygon.bindPopup(popupContent);
				}

				polygon.addTo(map);
				zonePolygons.push(polygon);
			}
		}

		// https://leafletjs.com/reference-1.4.0.html#control-layers
		var events = [];
		var visibleEvents = [];
		var eventTypes = [];
		function loadEvents() {
			showStatusMessage("Loading events...");
			eventTypes = [];
			$.get(<?php echo LR\Filters::escapeJs($service->endpoints->events) /* line 511 */ ?>, { server: server, file: log }).done(function (data) {
				var result = JSON.parse(data);
				if (result.error)
				{
					showStatusMessage("Failed to load logfiles (message: '" + result.message + "')", 15000);
					return;
				}
				processEvents(result);
			}).fail(function (jqXHR, textStatus, errorThrown) {
				showStatusMessage("Failed to load map events (message: '" + textStatus + "')", 15000);
			});
		}

		function processEvents( data ) {
			events = data.events;
			$( "#event-count" ).text(events.length);
			$( "#event-time-from" ).text(data.time.from);
			$( "#event-time-to" ).text(data.time.to);
			$( "#time-from" ).removeAttr("disabled");
			$( "#time-to" ).removeAttr("disabled");
			$( "#steamid" ).removeAttr("disabled");

			if (events.length === 0)
			{
				$( "#no-events" ).modal('show');
				return;
			}

<?php
		if ($service->limits->filters->type) {
?>
			for (var i = 0; i < events.length; i++) {
				var e = events[i];
				eventTypes[e.event_type] = e.event_type;
			}

			var $eventTypes = $("#event-types").html("");
			eventTypes.sort();
			for (var eventType in eventTypes)
			{
				if (!eventTypes.hasOwnProperty(eventType))
					continue;
				$eventTypes.append($("<option selected>").attr("value", eventType).text(eventTypes[eventType]));
			}

			if (event_types)
				$eventTypes.val(event_types).change();
<?php
		}
?>

			time_from_default = data.time.first - 1;
			time_to_default = data.time.last + 1;
			timeFilter(data.time.filter);
			filterEvents();
			displayEvents();
		}

		function filterEvents() {
			showStatusMessage("Filtering events...");
			visibleEvents = [];
			for (var eventId in events) {
				if (!events.hasOwnProperty(eventId))
					continue;

				var e = events[eventId];

<?php
		if ($service->limits->filters->type) {
?>
				// Event type filters
				if (event_types && event_types.indexOf(e.event_type) === -1)
					continue;
<?php
		}
?>

<?php
		if ($service->limits->filters->time) {
?>
				// Time filters
				if (e.event_time < $("#time-from").val())
					continue;
				if (e.event_time > $("#time-to").val())
					continue;
<?php
		}
?>

<?php
		if ($service->limits->filters->steamid) {
?>
				// SteamID filter
				if (steamid64 && e.event_data.steamid64 != steamid64)
					continue;
<?php
		}
?>

				visibleEvents.push(e);
			}
		}

		// https://github.com/Leaflet/Leaflet.markercluster
		var clusterGroup = L.markerClusterGroup({
			/*disableClusteringAtZoom:  ,*/
			maxClusterRadius: 30,
		});
		map.addLayer(clusterGroup);

		var paths = [];
		function paths_global__validate( id ) {
			if (typeof paths[id] === "undefined")
			{
				paths[id] = {};
				paths__validate(id, 'normal');
				paths__validate(id, 'kill');
			}
		}

		function paths__validate( id, type, options ) {
			if (typeof paths[id] === "undefined")
				paths_global__validate(id);

			if (typeof paths[id][type] === "undefined")
			{
				paths[id][type] = {
					id: 0,
					entries: {
						0: [],
					},
					options: options || {
						color: "#000000",
						weight: 1.75,
						opacity: 0.8,
					}
				};
			}
		}

		function paths__terminate( id, type ) {
			paths[id][type].id++;
			paths[id][type].entries[paths[id][type].id] = [];
		}

		function paths__push( id, type, data ) {
			paths[id][type].entries[paths[id][type].id].push(data);
		}

		function lineTo_foreach( targets, object, callback, callback_data ) {
			for (var propId in targets)
			{
				if (!targets.hasOwnProperty(propId))
					continue;

				object = object[propId];
				var prop = targets[propId];
				if (typeof prop === "object")
				{
					lineTo_foreach(prop, object, callback, callback_data);
				}
				else
				{
					callback(object[prop], callback_data);
				}
			}
		}

		var markers = [];
		var lines = [];
		function displayEvents() {
			showStatusMessage("Rendering events...");
			$("#event-count-filtered").text(visibleEvents.length);
			clusterGroup.clearLayers();
			markers = [];

			for (var i = 0; i < lines.length; i++) {
				map.removeLayer(lines[i]);
			}
			lines = [];

			paths = [];
			for (var i = 0; i < visibleEvents.length; i++) {
				var e = visibleEvents[i];
				if (e.event_data.position == null
					|| e.event_data.position.x == null
					|| e.event_data.position.y == null
					|| e.event_data.position.z == null)
				{
					console.log("Malformed event: %o", e);
					continue;
				}

				var markerType = markerTypes['blue'];

				var settings = eventSettings[e.event_type];
				if (settings)
				{
					markerType = markerTypes[settings.marker]
				}

<?php
		if ($service->limits->extensions->visuals->connectEvents) {
?>
				if ($("#connectEvents:checked").val()) {
					paths__validate(e.event_data.steamid64, 'normal', {
						color: "#000000",
						weight: 1.75,
						opacity: 0.8,
					});
					paths__push(e.event_data.steamid64, 'normal', getLatLngFromPosition(e.event_data.position));

					if (settings)
					{
						if (settings.terminatesSequence)
						{
							paths__terminate(e.event_data.steamid64, 'normal');
						}
					}
				}
<?php
		}
?>

<?php
		if ($service->limits->extensions->visuals->additionalEventData) {
?>
				if ($("#visualizeAdditionalData:checked").val()) {
					if (settings && settings.lineTo)
					{
						paths__validate(e.event_data.steamid64, 'additional', settings.lineTo.options);
						lineTo_foreach(settings.lineTo.targets, e.event_data, function( targetPosition, e ) {
							paths__push(e.event_data.steamid64, 'additional', getLatLngFromPosition(e.event_data.position));
							paths__push(e.event_data.steamid64, 'additional', getLatLngFromPosition(targetPosition));
							paths__terminate(e.event_data.steamid64, 'additional');
						}, e);
					}
				}
<?php
		}
?>

				var marker = L.marker(getLatLng(e.event_data.position.x, e.event_data.position.z, e.event_data.position.y), {
					//title: e.event_type,
					icon: markerType,
				});

<?php
		if ($service->limits->tooltips->enabled) {
?>
				var tooltipContent = e.event_tooltip;
				marker.bindTooltip(tooltipContent);
<?php
		}
?>

<?php
		if ($service->limits->popups->enabled) {
?>
				var popupContent = "";

				popupContent+= "<div>";
<?php
			if ($service->limits->popups->type) {
?>
				popupContent+= "<h6>" + e.event_type;
<?php
			}
			if ($service->limits->popups->datetime) {
?>
				popupContent+= " <small>" + e.event_data.datetime + "</small>";
<?php
				if ($service->limits->filters->time) {
?>
				popupContent+= "<small><a href='javascript:setTimeFilter(" + e.event_time + ", 15);'>&plusmn;15m</a></small>";
<?php
				}
			}
			if ($service->limits->popups->type) {
?>
				popupContent+= "</h6>";
<?php
			}
?>
				popupContent+= "</div>";

				popupContent+= "<div>";
<?php
			if ($service->limits->popups->name) {
?>
				popupContent+= "<b>" + e.event_data.name + "</b>";
<?php
			}
			if ($service->limits->popups->steamProfile) {
				if ($service->limits->popups->name) {
?>
				popupContent+= " (";
<?php
				}
?>
				if (e.event_data.steamid64)
				{
					popupContent+= "<a href=\"https://steamcommunity.com/profiles/" + e.event_data.steamid64 + "/\" target=\"_blank\">Steam profile</a>";
<?php
				if ($service->limits->filters->steamid) {
?>
					popupContent+= ", <small><a href='javascript:$(\"#steamid\").val(\"" + e.event_data.steamid64  + "\").keyup();'>filtr</a></small>";
<?php
				}
?>
				}
<?php
				if ($service->limits->popups->name) {
?>
				popupContent+= ")";
<?php
				}
			}
?>
				popupContent+= "</div>";

<?php
			if ($service->limits->popups->json) {
?>
				popupContent += "<pre class='mt-2'>" + JSON.stringify(e.event_data, null, 2) + "</pre>";
<?php
			}
?>

<?php
			if ($service->debug) {
?>
				if (e.debug)
				{
					popupContent += "<div><b>DEBUG</b> Matched from: <code>" + e.debug.match + "</code></div>";
				}
<?php
			}
?>

				marker.bindPopup(popupContent);
<?php
		}
?>

				clusterGroup.addLayer(marker);
				//marker.addTo(clusterGroup);

				markers.push(marker);
			}

			for (var steamid in paths) {
				if (!paths.hasOwnProperty(steamid))
					continue;

				var playerPaths = paths[steamid];
				for (var type in playerPaths) {
					if (!playerPaths.hasOwnProperty(type))
						continue;

					var playerPath = playerPaths[type];
					for (var id in playerPath.entries)
					{
						if (!playerPath.entries.hasOwnProperty(id))
							continue;

						lines.push(L.polyline(playerPath.entries[id], playerPath.options).addTo(map));
					}
				}
			}

			showStatusMessage("Events successfully processed!");
		}

		/*
		L.marker(getLatLng(0, 0)).addTo(map);
		L.marker(getLatLng(15360, 15360)).addTo(map);
		L.marker(getLatLng(0, 15360)).addTo(map);
		L.marker(getLatLng(15360, 0)).addTo(map);
		*/

		function setUrlParam(key, value) {
			const searchParams = new URLSearchParams(window.location.search);
			if (value == null)
				searchParams.delete(key);
			else
				searchParams.set(key, value);
			window.history.pushState(null, document.title, "?" + searchParams.toString());
		}

		function processServers( servers ) {
<?php
		if ($service->limits->extensions->server) {
?>
			for (var group in servers)
			{
				if (!servers.hasOwnProperty(group))
					continue;

				var g = $("<optgroup>").attr("label", group);
				for (var s in servers[group])
				{
					if (!servers[group].hasOwnProperty(s))
						continue;

					g.append($("<option>").attr("value", s).text(servers[group][s]));
				}
			}
			var $server = $( "#server" ).append(g);
			if (server)
				$server.val(server).change();

<?php
		}
		else {
?>
			for (var group in servers)
			{
				if (!servers.hasOwnProperty(group))
					continue;

				for (var s in servers[group])
				{
					if (!servers[group].hasOwnProperty(s))
						continue;

					server = s;
<?php
			if ($service->limits->extensions->log) {
?>
					loadLogfiles();
<?php
			}
			else {
?>
					loadZones();
					loadEvents();
<?php
			}
?>
				}
			}
<?php
		}
?>
		}

		$(function() {
			showStatusMessage("Loading available server list...");
			$.get(<?php echo LR\Filters::escapeJs($service->endpoints->servers) /* line 883 */ ?>).done(function (data) {
				var servers = JSON.parse(data);
				if (servers.error)
				{
					showStatusMessage("Failed to load logfiles (message: '" + servers.message + "')", 15000);
					return;
				}
				processServers(servers);
			}).fail(function (jqXHR, textStatus, errorThrown) {
				showStatusMessage("Failed to load server list (message: '" + textStatus + "')", 15000);
			});

<?php
		if (isset($_GET['map_x']) && isset($_GET['map_y'])) {
			?>			map.flyTo([ <?php echo LR\Filters::escapeJs($_GET['map_x']) /* line 896 */ ?>, <?php echo LR\Filters::escapeJs($_GET['map_y']) /* line 896 */ ?> ], parseInt(<?php
			echo LR\Filters::escapeJs(@$_GET['map_zoom']) /* line 896 */ ?>));
<?php
		}
?>
		});
	</script>
<?php
	}

}
