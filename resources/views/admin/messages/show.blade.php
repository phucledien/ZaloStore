@extends ('admin.layouts.master')

@section('content')
<div class="container-fluid">
    
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('messages.index') }}">Messages</a>
        </li>
    </ol>
    <div class="card">
        <div class="card-header">
            {{ $customer->name }}
        </div>
        <div class="card-body list-group" style="height: 500px; overflow: scroll;" id="chatbox"></div>
        <div class="card-footer">
            <form method="POST" action="{{ route('messages.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="text" class="form-control" placeholder="Type some text...">
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section ('scripts')
    <script>
        window.onload=function scrollBot () {
            var objDiv = document.getElementById("chatbox");
            objDiv.scrollTop = objDiv.scrollHeight;
        }

        let messages = [];
        
        const generateMessage = function (message) {
            const messageEl = document.createElement('div');
            messageEl.className = "list-group-item list-group-item-action flex-column align-items-start";
            if (message.from === 1) {
                messageEl.innerHTML = `<div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">${message.name}: </h5>
                                            <small>${message.created_at}</small>
                                        </div>
                                        <p class="mb-1">${message.text}</p>`;
            } else {
                messageEl.innerHTML = `<div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">You: </h5>
                                            <small>${message.created_at}</small>
                                        </div>
                                        <p class="mb-1">${message.text}</p>`
            }
            
            return messageEl;
        }

        const renderMessages = function (messages) {
            document.querySelector('#chatbox').innerHTML = '';
            messages.forEach((message) => {
                const messageEl = generateMessage(message);
                document.querySelector('#chatbox').appendChild(messageEl);
            });
            var objDiv = document.getElementById("chatbox");
            objDiv.scrollTop = objDiv.scrollHeight;
        }

        axios.get("{{ route('api.messages.show', [$customer->id]) }}")
            .then(response => {
                messages = response.data;
                renderMessages(messages);
            });

        window.Echo.channel('messages')
        .listen('MessageCreated', e => {
            axios.get("{{ route('api.messages.show', [$customer->id]) }}")
            .then(response => {
                messages = response.data;
                renderMessages(messages);
            });
        });
    </script>
@endsection