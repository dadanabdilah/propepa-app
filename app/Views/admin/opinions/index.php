<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Berbagi Opini
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Berbagi Opini</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="./index.html">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Berbagi Opini</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <img src="<?= base_url('assets/images/breadcrumb/ChatBc.png') ?>" alt="" class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card overflow-hidden chat-application">
    <div class="d-flex">
        <div class="w-100 w-xs-100 chat-container">
            <div class="chat-box-inner-part h-100">
                <div class="chatting-box d-block">
                    <div class="position-relative overflow-hidden d-flex">
                        <div class="position-relative d-flex flex-grow-1 flex-column">
                            <div class="chat-box p-9" style="height: calc(100vh - 400px)" data-simplebar data-simplebar-auto-hide="false">
                                <div class="chat-list chat active-chat">
                                    <div id="chat-room">
                                        <?php foreach ($opinions as $opinion) : ?>
                                            <?php if ($opinion->user_id != auth()->id()) : ?>
                                                <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                    <img src="https://ui-avatars.com/api/?name=<?= $opinion->User->name ?>" alt="user" width="40" height="40" class="rounded-circle" />
                                                    <div>
                                                        <h6 class="fs-2 text-muted"><?= $opinion->User->name ?></h6>
                                                        <div class="p-2 bg-light rounded-1 d-inline-block text-dark fs-3"> <?= $opinion->opinion ?></div>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php if ($opinion->user_id == auth()->id()) : ?>
                                                <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                    <div class="text-end">
                                                        <div class="p-2 bg-light-info text-dark rounded-1 d-inline-block fs-3"> <?= $opinion->opinion ?></div>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <div class="py-6 border-top chat-send-message-footer">
                                <div class="w-100">
                                    <form action="<?= site_url('admin/opinions') ?>" method="POST" id="opinion">
                                        <?= csrf_field() ?>

                                        <textarea name="opinion" class="form-control text-muted border-0 p-0 ms-2" rows="5" placeholder="Ketik Pesan" id="text-opinion"></textarea>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script>
    $(document).ready(() => {
        $('.chat-box .active-chat').slice(-1)[0].scrollIntoView({
            block: "end"
        });

        $("textarea").keydown(function(e) {
            if (e.keyCode == 13 && !e.shiftKey) {
                e.preventDefault();

                let $form = $(this),
                    opinionText = $('#text-opinion').val(),
                    url = $form.attr("action");

                let posting = $.post(url, {
                    opinion: opinionText
                });

                $('textarea').val('')
            }
        });
    });
</script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    function bindWithChunking(channel, event, callback) {
        channel.bind(event, callback);

        var events = {};
        channel.bind("chunked-" + event, data => {
            if (!events.hasOwnProperty(data.id)) {
                events[data.id] = {
                    chunks: [],
                    receivedFinal: false
                };
            }
            var ev = events[data.id];
            ev.chunks[data.index] = data.chunk;
            if (data.final) ev.receivedFinal = true;
            if (ev.receivedFinal && ev.chunks.length === Object.keys(ev.chunks).length) {
                callback(JSON.parse(ev.chunks.join("")));
                delete events[data.id];
            }
        });
    }

    Pusher.logToConsole = true;

    var pusher = new Pusher("<?= $PUSHER_APP_KEY ?>", {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        let chatDOM = $('#chat-room').html();

        let userId = <?= auth()->id() ?>;

        chatDOM += `
           ${data.opinions.user_id != userId ? `<div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                    <img src="https://ui-avatars.com/api/?name=${data.opinions.user.name}" alt="user" width="40" height="40" class="rounded-circle" />
                    <div>
                        <h6 class="fs-2 text-muted">${data.opinions.user.name}</h6>
                        <div class="p-2 bg-light rounded-1 d-inline-block text-dark fs-3"> ${data.opinions.opinion}</div>
                    </div>
                </div>` : ''}

            ${data.opinions.user_id == userId ? `<div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                    <div class="text-end">
                        <div class="p-2 bg-light-info text-dark rounded-1 d-inline-block fs-3"> ${data.opinions.opinion}</div>
                    </div>
                </div>` : '' }
           `

        $('#chat-room').html(chatDOM);
    })
</script>
<?= $this->endSection() ?>