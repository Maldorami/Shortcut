@extends('layouts.app')

@section('content')
<div class="container">

	<h1 class="display-3 col-md-12 mt-3 text-center"> ¿Cómo funciona? </h1>

	<div class="row align-items-center justify-content-center">
		<h2 class="display-4 col-md-12 mt-3 text-center"> Como Companía </h2>
		<div class="col-md-6 mt-4">
			<h3> 1. Publica tu proyecto </h3>
			<p> Publicar tu proyecto siempre es gratis. Automáticamente comenzarás a recibir ofertas por parte de nuestros freelancers. De manera alternativa, puedes explorar el talento disponible en nuestro sitio y realizar, en lugar de ello, una oferta directa a un freelancer.</p> 
			<h3>2. Seleccione freelancers</h3>
			<ul>
				<li> Explora los perfiles de los freelancers. </li> <br>
				<li> Conversa en tiempo real</li><br>
				<li> Comparar propuestas </li><br>
				<li> Selecciona a tu favorito y hazle una oferta de trabajo.</li>
			</ul>
			<h3>3. ¡Acuerda la forma de trabajo y el pago! </h3>
			<p> Conversa con el freelancer seleccionado sobre la forma en la que se pagará el trabajo y los entregables necesarios para que el pago </p>
		</div>
		<div class="col-md-6 mt-4">
			<img src="{{ URL::to('shortcut_imges/hola.jpg')}}" style="width: 100%; height: auto;">
		</div>
	</div>

	<h2 class="display-4 col-md-12 mt-3 text-center"> Como Freelancer </h2>
	
	<div class="row align-items-center justify-content-center mt-5">
		<div class="col-md-6">
			<img src="{{ URL::to('shortcut_imges/faqba.png')}}" style="width: 100%; height: auto;">
		</div>

		<div class="col-md-6 mt-4">
			<h3> 1. Crea tu perfil  </h3>
			<p> Completa toda la información que te resulte importante publicar para que otros puedan conocer tus trabajos realizados,  habilidades e intereses</p> 
			<h3>2. Explora las oportunidades</h3>
			<ul>
				<li> Busca proyectos relacionados con tus intereses y habilidades</li> <br>
				<li> Conversa en tiempo real</li><br>
				<li> Acuerda entregables y tarifa por tu trabajo </li><br>
			</ul>

			<h3>3. ¡Taran... Ponte a trabaja! </h3>
			<p> Esfuerzate por entregar el mejor trabajo, las personas que te contratan podrán valorar tus aportes a sus proyectos y así acumular increibles referencias. </p> 
		</div>
	</div>

	<div class="row">
		<h2 class="col-md-12 mt-5 text-center display-4"> Preguntas Frecuentes </h2>
		<div class="col-md-6 mt-4">
			<h3> 1. ¿Qué es shortcut?  </h3>
			<p> 
				Es una plataforma donde empleadores y una red global de profesionales independientes entran en contacto para trabajar en un objetivo en común bajo una contratación acordada entre las partes. Cualquier miembro puede publicar un proyecto, ya sea un trabajo a corto o largo plazo, y elegir entre profesionales independientes asi como cualquier freelancer puede explorar los proyectos publicados y ofrecer sus servicios.
			</p> 
		</div>

		<div class="col-md-6 mt-4">
			<h3> 2.  ¿Shorcut es quien me ofrece y me contrara?  </h3>
			<p>
				Shorcut no ofrece ningún trabajo, pero te damos un sistema para encontrar trabajo.
			</p>
		</div>

		<div class="col-md-6 mt-4">
		<h3> 3.  ¿Cómo me registro como empresa / lider de un proyecto?  </h3>
		<p>
			Crea Tu Perfil. Complete su perfil de manera correcta y completa para que la comunidad de Freelancers sepa quién es usted como persona y lo que está buscando profesionalmente. Los usuarios con perfiles incompletos no podrán ofertar en proyectos.
			Publica tus proyectos detallando el nombre, objetivo y descripción de lo que estás buscando en la comunidad de freelancers. Sé lo más especifico que puedas respecto a la experiencia y requisitos que necesitas de un freelancer.
			Luego, entra en contacto con las personas que cumplan con tus requisitos para evaluar y seleccionar los mejores expertos en lo que buscas.
		</p> 	
		</div>

		<div class="col-md-6 mt-4">
		<h3> 4. ¿Cómo me registro como freelancer?  </h3>
		<p>
			Complete un breve formulario de registro. Se le pedirá que ingrese un email válido para la identificación en nuestro sistema, y confirme que ha leído nuestros Términos y condiciones.

			Una vez confirmado su correo electronico podrá completar el perfil con sus experiencias profesionales, sus intereses y habilidades claves. No olvides colocar una foto para que los empleadores, es mucho más fácil reconocer y relacionarse con una cara que con un nombre de usuario. 

			La información que proporcione en su página de perfil le dará a otros usuarios una visión general de sus habilidades y / o 	necesidades. Freelancer.com no comparte su información personal y de contacto en la página de detalles de su perfil.
		</p>
		</div>

		<div class="col-md-6 mt-4">
		<h3> 5. ¿Porque mi cuenta está suspendida?  </h3>
		<p> 
			<p>
			Hay varias razones posibles para suspender la cuenta de un usuario:
		</p>

		<ul>
			<li>
				Publicar de información de contacto o enlaces a información de contacto en una descripción del proyecto, una oferta o en los tableros de mensajes. Esta es la razón más común para la eliminación del proyecto y la suspensión de la cuenta.
			</li>
			<li>
				Publicar contenido no válido o inadecuado en una descripción de proyecto, una oferta o en los tableros de mensajes. Esto puede incluir anuncios e información ilegal o inapropiada.
			</li>
			<li>
				Violar los Términos y Condiciones del Shortcut. Esto también puede resultar en la terminación de la cuenta. Lea y comprenda nuestros Términos y condiciones antes de usar el sitio.
			</li>
		</ul>
		</div>

		<div class="col-md-6 mt-4">
		<h3> 6. ¿Qué sucede si un Freelancer no completa mi proyecto? </h3>
		<p>
			Los empleadores tienen la opción de marcar su proyecto como incompleto si el profesional independiente no puede completar el trabajo requerido. El Informe Incompleto se publicará en la página de perfil del profesional independiente como una revisión del proyecto.	Para dejar un Informe Incompleto, vaya a la página del proyecto, haga clic en Finalizar Proyecto , seleccione "El profesional independiente no puede completar mi proyecto". y haz clic en Enviar.		
		</p>
		</div>

		<div class="col-md-6 mt-4">
		<h3> 7. ¿Cómo califico y escribo una opinión sobre un freelancer?  </h3>
		<p>
			Una vez que se completa un proyecto y se paga al profesional independiente el monto total, el sistema de comentarios para ese proyecto estará disponible. Se lo redireccionará automáticamente al formulario de comentarios una vez que marque su proyecto como completado.
		</p>	
		</div>

		<div class="col-md-6 mt-4">
		<h3> 8. ¿Puedo cambiar mi nombre de usuario? </h3>
		<p>
			No, el nombre de usuario es permanente, no podrá cambiarse. Por lo tanto, a la hora de elegir tu nombre de usuario, seleccione el más apropiado.
		</p>
		</div>
	</div>
</div>
</div>
@endsection