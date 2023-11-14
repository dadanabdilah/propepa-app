<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>
Berbagi Opini
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card bg-light-danger shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Berbagi Opini</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-muted " href="<?= site_url('admin/dashboard') ?>">Dashboard</a></li>
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
                                      <?php if($opinions): ?>
                                          <?php foreach ($opinions as $key => $opinion) : ?>
                                            <?php if ($opinion['user_id'] != auth()->id()) : ?>
                                                <div class="hstack gap-3 align-items-start mb-7 justify-content-start">
                                                    <img src="https://ui-avatars.com/api/?name=<?= $opinion['user_name'] ?>" alt="user" width="40" height="40" class="rounded-circle" />
                                                    <div>
                                                        <h6 class="fs-2 text-muted"><?= $opinion['user_name'] ?></h6>
                                                        <div class="p-2 bg-light rounded-1 d-inline-block text-dark fs-3"> <?= $opinion['message'] ?></div>
                                                        <a href="#" class="btn delete-alert" data-action="<?= site_url('admin/opinions/' . $key) ?>" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
                                                            <i class="ti ti-trash fs-5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php if ($opinion['user_id'] == auth()->id()) : ?>
                                                <div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                                                    <div class="text-end">
                                                        <div class="p-2 bg-light-danger text-dark rounded-1 d-inline-block fs-3"> <?= $opinion['message'] ?></div>
                                                        <a href="#" class="btn delete-alert" data-action="<?= site_url('admin/opinions/' . $key) ?>" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
                                                            <i class="ti ti-trash fs-5"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                      <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="px-9 py-6 border-top chat-send-message-footer">
                                <form action="<?= site_url('admin/opinions') ?>" method="POST" id="message">
                                    <?= csrf_field() ?>

                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-2 w-85">
                                            <textarea name="message" class="form-control text-muted border-0 p-0 ms-2" rows="5" placeholder="Ketik Pesan" id="text-message"></textarea>
                                        </div>
                                        <ul class="list-unstyledn mb-0 d-flex align-items-center">
                                            <li><button type="button" class="btn text-dark px-2 fs-7 bg-hover-white nav-icon-hover position-relative z-index-5 " id="btn-submit"><i class="ti ti-send"></i></button></li>
                                        </ul>
                                    </div>
                                </form>
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

        $('#btn-submit').on('click', (e) => {
            e.preventDefault();

            let $form = $(this),
                opinionText = $('#text-message').val(),
                url = $form.attr("action");

            let posting = $.post(url, {
                message: opinionText
            });

            $('textarea').val('')
        })

        $("textarea").keydown(function(e) {
            if (e.keyCode == 13 && !e.shiftKey) {
                e.preventDefault();

                let $form = $(this),
                    opinionText = $('#text-message').val(),
                    url = $form.attr("action");

                let posting = $.post(url, {
                    message: opinionText
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
                    <img src="https://ui-avatars.com/api/?name=${data.opinions.user_name}" alt="user" width="40" height="40" class="rounded-circle" />
                    <div>
                        <h6 class="fs-2 text-muted">${data.opinions.user_name}</h6>
                        <div class="p-2 bg-light rounded-1 d-inline-block text-dark fs-3"> ${data.opinions.message}</div>
                        <a href="#" class="btn delete-alert" data-action="<?= site_url('admin/opinions/') ?>${data.key}" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
                            <i class="ti ti-trash fs-5"></i>
                        </a>
                    </div>
                </div>` : ''}

            ${data.opinions.user_id == userId ? `<div class="hstack gap-3 align-items-start mb-7 justify-content-end">
                    <div class="text-end">
                        <div class="p-2 bg-light-danger text-dark rounded-1 d-inline-block fs-3"> ${data.opinions.message}</div>
                        <a href="#" class="btn delete-alert" data-action="<?= site_url('admin/opinions/') ?>${data.key}" data-csrf-name="<?= csrf_token() ?>" data-csrf-token="<?= csrf_hash() ?>" data-bs-toggle="tooltip" title="Hapus">
                            <i class="ti ti-trash fs-5"></i>
                        </a>
                    </div>
                </div>` : '' }
           `

        $('#chat-room').html(chatDOM)
    })
</script>
<?= $this->endSection() ?>