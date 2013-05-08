<?php include('cabecalho.php');?>

<div id="conteudo">	
	<div class="col720">
		<div id="promocoes">
		  <div id="controles">
				<div class="descricao">
				   <div class="texto-desc" id="txt-01ID">
						<h2>Título</h2>
						<p>A string representing one of the three predefined speeds ("slow", "normal", or "fast") or the number of milliseconds to run the animation (e.g. 1000).</p>
						
					</div>
					<div class="texto-desc inativo" id="txt-02ID">
						<h2>Título2</h2>
						<p>A string representing one of the three predefined speeds ("slow", "normal", or "fast") or the number of milliseconds to run the animation (e.g. 1000).</p>
						
					</div>
				</div>
			</div>
			<div id="slides">
				<div class="slideimg" id="img-id01">
					<a href="#"><img src="css/img/promocao.png" width="800px" height="250px" /></a>
				</div>
				<div class="slideimg inativo" id="img-id02" bgcolor="#000">
					<a href="#"><img src="css/img/promocao.png" width="800px" height="250px" /></a>
				</div>
			</div>
		</div><!-- promocoes-->
		<label style="margin-bottom:20px">Outros / Lançamentos</label>
		<div id="container_mas" style="position:relative; min-height:500px">
			<div class="jobBoxF item" style="position:absolute; width:200px; height:180px; left:30px; top:30px; ">
                    <a href="#"><br>
					<p>Confira os produtos, que separamos especialmente pra você</p></a>
            </div>
			<div class="item" style="position:absolute; left:260px; top:20px">
				<a href="categorias/index.php?id=1">
					<img src="css/img/destaque3.png" /><br>
					<span class="details"><strong>Brincos</strong><br>Diversas variedades</span>
				</a>			
			</div>
			<div class="item" style="position:absolute; left:500px; top:20px">
				<a href="categorias/index.php?id=2">
					<img src="css/img/destaque2.png" /><br>
					<span class="details"><strong>Andani</strong><br>Miriam Sánchez Ocampo</span>
				</a>			
			</div>
			<div class="item" style="position:absolute; left:740px; top:20px">
				<a href="categorias/index.php?id=2">
					<img src="css/img/destaque4.png" /><br>
					<span class="details"><strong>Andani</strong><br>Miriam Sánchez Ocampo</span>
				</a>			
			</div>
			<div class="item" style="position:absolute; left:260px; top:210px">
				<a href="categorias/index.php?id=9">
					<img src="css/img/destaque1.png" />
					<span class="details"><strong>Andani</strong><br>Miriam Sánchez Ocampo</span>
				</a>			
			</div>
		
			<div class="item" style="position:absolute; left:20px; top:240px">
				<a href="categorias/index.php?id=9">
					<img src="css/img/destaque5.png" />
					<span class="details"><strong>Andani</strong><br>Miriam Sánchez Ocampo</span>
				</a>			
			</div>			
		</div>
		
		<!--div id="destaques">
			<label style="color:#ff5400">Brincos</label>
			<div class="box3">
					<a href="categorias/index.php?id=1"><img src="css/img/destaque3.png" /></a>
					<div style="top:0; width:420px"class="separador"></div>
				</div>
				<div class="box4">
					<a href="categorias/index.php?id=2"><img src="css/img/destaque4.png" /></a>
					<div style="top:0; width:480px"class="separador"></div>
				</div>
				<br><br>
			<label style="color:#000">Religiosos</label>
			<div class="box5">
				<a href="categorias/index.php?id=9"><img src="css/img/destaque1.png" /></a>
			</div>
			<div class="ultimo">
				<a href="categorias/index.php?id=7"><img src="css/img/destaque5.png" /></a>
			</div-->
		</div><!-- destaques-->
		
	</div><!-- col720 -->
	<div style="clear:both"></div>
</div><!-- conteudo -->
<?php include('rodape.php');?>