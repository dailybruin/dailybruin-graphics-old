<!DOCTYPE html>
<html>

<head>
	<title>Daily Bruin | Graphics</title>
	
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.4.1/build/cssreset/cssreset-min.css">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script type="text/javascript" src="../d3/d3.js"></script>
    <script type="text/javascript" src="../d3/d3.geom.js"></script>
    <script type="text/javascript" src="../d3/d3.layout.js"></script>

</head>

<body>
<!--
	<div class="db_refer">
		<div class="container">
			<span class="db_link four columns offset-by-three">more at <a href="http://dailybruin.com" class="hoverlink">dailybruin.com</a></span>
			<span class="db_section eight columns">
				<ul class="blank db_sections">
					<li><a href="http://www.dailybruin.com/index.php/section/news">News</a></li>
					<li><a href="http://www.dailybruin.com/index.php/section/sports">Sports</a></li>
					<li><a href="http://www.dailybruin.com/index.php/section/ae">A&amp;E</a></li>
					<li><a href="http://www.dailybruin.com/index.php/section/opinion">Opinion</a></li>
					<li><a href="http://www.dailybruin.com/index.php/multimedia/video">Video</a></li>
					<li><a href="http://www.dailybruin.com/index.php/section/radio">Radio</a></li>
				</ul>
			</span>
		</div>
	</div>
-->

	<img id="nameplate" src="img/Nameplate.png" />	
	
	<div id="tophide"></div>	
	<div id="topback"></div>
	<div id="topbar">
		<span id="topbarcontent">Serving the University of California, Los Angeles community since 1919</span>
	</div><!-- End div topbar -->
	
	
	<section id="content">
		<div id="backtoarticle" onclick="location.href='http://dailybruin.com';" style="cursor:pointer;">
			<img src="img/Arrow.png">
			Return to Article
			<img src="img/Arrow.png">
		</div><!-- End div backtoarticle -->
		<div id="socialmedia">
		<h2>SHARE</h2>
		<ul>
			<li></li><a href="http://twitter.com/dailybruin"><img src="img/Twitter.png"></a></li>
			<li></li><a href="http://facebook.com/dailybruin"><img src="img/Facebook.png"></a></li>
		</ul>
	</div><!-- End div socialmedia -->


		<article>
			<h1>Global reach: recruitment abroad</h1>
			<span class="byline">By Kelly Zhou</span>
			<span class="date"><span class="leftDate"> </span>Oct. 27, 2011</span>

		</article>
		
		<br class="clear" />
	</section>


	<footer>
		<span id="footermessage">Content Copyright 2011 | <strong><a href="http://dailybruin.com">the Daily Bruin</a></strong></span>
	</footer>
	
<script type="text/javascript">
var color = d3.scale.category20c()
	r = 150; 

var data = [{'name':'China','Apps2008':413,'Apps2009':717,'Apps2010':1133,'Apps2011':2252},
			{'name':'USA','Apps2008':5730,'Apps2009':5768,'Apps2010':6075,'Apps2011':6960}];
var vis = d3.select('article')
	.append('svg:svg')
	.attr('width',300)
	.attr('height',300)
	.style('background-color','#DDD')
	.data([data])
	.append("svg:g")
		.attr("transform", "translate(" + r + "," + r + ")");
		
var arc = d3.svg.arc()              //this will create <path> elements for us using arc data
	.outerRadius(r);

var pie = d3.layout.pie()           //this will create arc data for us given a list of values
        .value(function(d) { return d.Apps2008; });    //we must tell it out to access the value of each element in our data array
        
var arcs = vis.selectAll("g.slice")     //this selects all <g> elements with class slice (there aren't any yet)
        .data(pie)                          //associate the generated pie data (an array of arcs, each having startAngle, endAngle and value properties) 
        .enter()                            //this will create <g> elements for every "extra" data element that should be associated with a selection. The result is creating a <g> for every object in the data array
            .append("svg:g")                //create a group to hold each slice (we will have a <path> and a <text> element associated with each slice)
                .attr("class", "slice");    //allow us to style things in the slices (like text)

arcs.append("svg:path")
                .attr("fill", function(d, i) { return color(i); } ) //set the color for each slice to be chosen from the color function defined above
                .attr("d", arc);                                    //this creates the actual SVG path using the associated data (pie) with the arc drawing function

arcs.append("svg:text")                                     //add a label to each slice
                .attr("transform", function(d) {                    //set the label's origin to the center of the arc
                //we have to make sure to set these before calling arc.centroid
                d.innerRadius = 0;
                d.outerRadius = r;
                return "translate(" + arc.centroid(d) + ")";        //this gives us a pair of coordinates like [50, 50]
            })
            .attr("text-anchor", "middle")                          //center the text on it's origin
            .text(function(d, i) { return data[i].name; });        //get the label from our original data array


/*vis.selectAll('circle')
	.data(data)
	.enter().append('svg:circle')
	        .attr("cx", 3)
        .attr("cy", 5)
        .attr("r",10)
        .attr("stroke-width", "none")
        .attr("fill", "black")
        .attr("fill-opacity", .5);*/

</script>

    <script type="text/javascript">
/*




        */
    </script>

</body>

</html>
