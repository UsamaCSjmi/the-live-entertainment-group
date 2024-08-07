editors = document.querySelectorAll( '.editor' );
editors.forEach(editor => {
	ClassicEditor
	.create( editor, {
		// Editor configuration.
	} )
	.then( editor => {
		window.editor = editor;
	} )
	.catch( handleSampleError );
	
});

function handleSampleError( error ) {
	const issueUrl = 'https://github.com/ckeditor/ckeditor5/issues';

	const message = [
		'Oops, something went wrong!',
		`Please, report the following error on ${ issueUrl } with the build id "1w1q4seviuvg-rbq2bo39vwdi" and the error stack trace:`
	].join( '\n' );

	console.error( message );
	console.error( error );
}
