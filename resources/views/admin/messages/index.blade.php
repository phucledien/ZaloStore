@extends ('admin.layouts.master')

@section('content')
<div class="container-fluid">
    
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Messages</li>
    </ol>

    <div class="list-group" id="messages"></div>
</div>
@endsection

@section ('scripts')
    <script>

        let messages = [];
        
        
        const generateMessage = function (message) {
            const messageEl = document.createElement('a');
            messageEl.href = `{{ url('admin/messages/uid') }}/${message.customer_id}`;
            messageEl.className = "list-group-item list-group-item-action flex-column align-items-start";
            if (message.from === 1) {
                messageEl.innerHTML = `<div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">${message.name}</h5>
                                            <small>${message.created_at}</small>
                                        </div>
                                        <p class="mb-1">${message.text}</p>`;
            } else {
                messageEl.innerHTML = `<div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">${message.name}</h5>
                                            <small>${message.created_at}</small>
                                        </div>
                                        <p class="mb-1">You: ${message.text}</p>`
            }
            
            return messageEl;
        }

        const renderMessages = function (messages) {
            document.querySelector('#messages').innerHTML = '';
            messages.forEach((message) => {
                const messageEl = generateMessage(message);
                document.querySelector('#messages').appendChild(messageEl);
            });
        }

        axios.get('{{ route('api.messages.index') }}')
            .then(response => {
                messages = response.data;
                renderMessages(messages);
            });

        window.Echo.channel('messages')
        .listen('MessageCreated', e => {
            axios.get('{{ route('api.messages.index') }}')
            .then(response => {
                messages = response.data;
                renderMessages(messages);
            });
        });
    </script> 
@endsection