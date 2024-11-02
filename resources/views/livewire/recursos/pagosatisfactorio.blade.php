<form action="/" method="POST">
	@csrf
	<div class="container-fluid">
		<div class="col-md-10">
			<div class="row border border-secondary ">

                <h1>Operacion Satisfactoria <br> {{ $id_suc }}</h1>

					<br>
                    <br>
                    <h5>
                        {{$success}}
                    </h5>
					<div class="col-6">
						<input type="submit" class="btn btn-success" value="Continuar">
					</div>
			</div>
		</div>
	</div>

</form>
