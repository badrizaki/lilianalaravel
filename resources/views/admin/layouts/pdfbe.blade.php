<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ url('assets/img/icon.png?v=1.1') }}">
	<style>
	    /* FONT FAMILY */
	    @font-face {
	      font-family: 'blogger_sansregular';
	      src: url('{{ url('assets/front/font/blogger_sans-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'blogger_sansbold';
	      src: url('{{ url('assets/front/font/blogger_sans-bold-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-bold-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'blogger_sansbold_italic';
	      src: url('{{ url('assets/front/font/blogger_sans-bold_italic-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-bold_italic-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'blogger_sansitalic';
	      src: url('{{ url('assets/front/font/blogger_sans-italic-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-italic-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'blogger_sanslight';
	      src: url('{{ url('assets/front/font/blogger_sans-light-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-light-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'blogger_sanslight_italic';
	      src: url('{{ url('assets/front/font/blogger_sans-light_italic-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-light_italic-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'blogger_sansmedium';
	      src: url('{{ url('assets/front/font/blogger_sans-medium-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-medium-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'blogger_sansmedium_italic';
	      src: url('{{ url('assets/front/font/blogger_sans-medium_italic-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/blogger_sans-medium_italic-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'robotolight';
	      src: url('{{ url('assets/front/font/roboto-light-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/roboto-light-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'robotomedium';
	      src: url('{{ url('assets/front/font/roboto-medium-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/roboto-medium-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	      letter-spacing: 2px;
	    }

	    @font-face {
	      font-family: 'robotoregular';
	      src: url('{{ url('assets/front/font/roboto-regular-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/roboto-regular-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

	    @font-face {
	      font-family: 'robotothin';
	      src: url('{{ url('assets/front/font/roboto-thin-webfont.woff2') }}') format('woff2'),
	      url('{{ url('assets/front/font/roboto-thin-webfont.woff') }}') format('woff');
	      font-weight: normal;
	      font-style: normal;
	    }

		body { font-family: 'blogger_sansregular',Arial,sans-serif; }
		h1 { text-align: center; }
		table.content tr th { background-color: #3777bb; color: #ffffff; padding: 10px; }
		table.content tr, table.content tr th, table.content tr td { border: 1px solid #3777bb; }
		table.content tr td { padding: 10px; }
	</style>
</head>
<body>
	<div>
		@yield('content')
	</div>
</body>
</html>