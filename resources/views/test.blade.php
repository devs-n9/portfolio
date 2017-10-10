<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h2>Projects</h2>
	<ul>
	@foreach($projects as $project)
	
		<li>{{ $project->name }}  ( {{ $project->category->category }} )</li>
	
	@endforeach
	</ul>
	
	
	<h2>Categories</h2>
	<ul>
	@foreach($categories as $category)
	
		<li>{{ $category->category }} {{ $category->projects->count() }}
		
			@if(!empty($category->projects))
				<ul>
				@foreach($category->projects as $project)
					<li> {{ $project->name }} </li>
				@endforeach
				</ul>
			@endif
		</li>
	
	@endforeach
	</ul>
	
	
	<h2>Categories with projects count</h2>
	<ul>
	@foreach($projectscat as $cat)
	
		<li>{{ $cat->category }}  ( {{ $cat->projects }} )</li>
	
	@endforeach
	</ul>
	
</body>
</html>