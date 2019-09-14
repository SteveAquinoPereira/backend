<!DOCTYPE html>

<html>

	<head>

		<title>Evaluaciones</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>

	<body>
		

			<div class="container" style="border:3px solid #000; margin-top:200px;">

				<div class="row">

					
					@foreach($cuts as $cut)
						<div class="col-sm-3" style="border:1px solid #000;">
							<div class="row">
								<div class="col-sm-12" style="border:2px solid #000; text-align: center;">
									<h1>{{$cut->cut_name}}</h1>
								</div>
							</div>
							<div class="row">
								@foreach($evaluations as $evaluation)
									@if($evaluation->id_cut01 == $cut->id_cut)
									<div class="col-sm-12" style="border:1px solid #000; text-align: center;">
										<p>{{$evaluation->evaluation_type}} {{$evaluation->percentage}}%</p>
									</div>
									<div class="col-sm-12" style="border:1px solid #000; text-align: center;">
										<p>{{$evaluation->grade}}</p>
									</div>
									
									@endif
								@endforeach
							</div>
						</div>
						@endforeach

				</div>

			</div>

		
	</body>

</html>

<!--@foreach($cuts as $cut)
						<div class="col-sm-3" style="border:1px solid #000;">
							<div class="row">
								<div class="col-sm-12" style="border:2px solid #000;">
									<h1>{{$cut->cut_name}}</h1>
								</div>
							</div>
							<div class="row">
								@foreach($evaluations as $evaluation)
									@if($evaluation->id_cut01 == $cut->id_cut)
									<div class="col-sm-6" style="border:1px solid #000;">
										<p>{{$evaluation->evaluation_type}} {{$evaluation->percentage}}%</p>
									</div>
									<div class="col-sm-6" style="border:1px solid #000;">
										<p>{{$evaluation->grade}}</p>
									</div>
									@endif
								@endforeach
							</div>
						</div>
						@endforeach-->