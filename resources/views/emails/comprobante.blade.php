<!DOCTYPE html>
<html>

<head>
    <title>Comprobantes Subidos</title>
</head>

<body>
    <h1>Estimado {{ $user->name }},</h1>
    <p>Hemos recibido tus comprobantes con los siguientes detalles:</p>
    @foreach ($comprobantes as $comprobante)
        <ul>
            <li>Nombre del Emisor: {{ $comprobante->issuer_name }}</li>
            <li>Tipo de Documento del Emisor: {{ $comprobante->issuer_document_type }}</li>
            <li>Número de Documento del Emisor: {{ $comprobante->issuer_document_number }}</li>
            <li>Nombre del Receptor: {{ $comprobante->receiver_name }}</li>
            <li>Tipo de Documento del Receptor: {{ $comprobante->receiver_document_type }}</li>
            <li>Número de Documento del Receptor: {{ $comprobante->receiver_document_number }}</li>
            <li>Monto Total: {{ $comprobante->total_amount }}</li>
        </ul>
    @endforeach


    @if (count($comprobantes_no_guardados) != 0)
        <h2>Comprobantes no registrados</h2>
        @foreach ($comprobantes_no_guardados as $comprobante)
            <ul>
                <li>Nombre del Emisor: {{ $comprobante->issuer_name }}</li>
                <li>Tipo de Documento del Emisor: {{ $comprobante->issuer_document_type }}</li>
                <li>Monto Total: {{ $comprobante->total_amount }}</li>

                <li>Motivo: {{ $comprobante->message_error }}</li>

            </ul>
        @endforeach
    @endif

    <p>¡Gracias por usar nuestro servicio!</p>
</body>

</html>
