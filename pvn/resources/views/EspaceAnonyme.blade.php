@extends('layout.navpatient')
@section('title', 'Forum Anonyme')

@section('content')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Forum Header -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-pvn-dark-green mb-4">Forum Anonyme</h1>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Un espace sûr pour partager vos pensées et recevoir du soutien. 
                    Tous les messages sont anonymes et bienveillants.
                </p>
            </div>
        </div>

        <!-- New Post Form -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-semibold text-pvn-dark-green mb-4">Partagez votre message</h2>
            <form action="{{ route('anonymous.forum.store') }}" method="POST">
                @csrf
                <textarea
                    name="content"
                    class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-pvn-green"
                    rows="4"
                    placeholder="Exprimez-vous librement..."
                    required
                ></textarea>
                <div class="flex justify-between items-center mt-4">
                    <div class="flex items-center space-x-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="notify_email" class="form-checkbox text-pvn-green">
                            <span class="ml-2 text-gray-700">Recevoir des réponses par email</span>
                        </label>
                    </div>
                    <button type="submit" class="bg-pvn-green text-white px-6 py-2 rounded-md hover:bg-pvn-dark-green">
                        Publier anonymement
                    </button>
                </div>
            </form>
        </div>

        <!-- Messages Feed -->
        <div class="space-y-6">
            @forelse($posts as $post)
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span class="bg-pvn-light-beige text-pvn-dark-green px-3 py-1 rounded-full text-sm">Anonyme</span>
                        <span class="text-gray-500 text-sm ml-2">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="flex space-x-2">
                        <button class="text-gray-400 hover:text-gray-600 report-button" data-type="post" data-id="{{ $post->id }}">
                            <i class="fas fa-flag"></i>
                        </button>
                        <button class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>
                <p class="text-gray-700 mb-4">
                    {{ $post->content }}
                </p>
                <div class="flex items-center space-x-4 mb-4">
                    <button class="flex items-center space-x-2 text-pvn-green hover:text-pvn-dark-green support-button" data-post-id="{{ $post->id }}">
                        <i class="fas fa-heart"></i>
                        <span class="support-count">{{ $post->support_count }}</span> soutiens
                    </button>
                    <button class="flex items-center space-x-2 text-pvn-green hover:text-pvn-dark-green toggle-comments" data-post-id="{{ $post->id }}">
                        <i class="fas fa-comment"></i>
                        <span>{{ $post->comments->count() }} réponses</span>
                    </button>
                </div>
                
                <!-- Responses -->
                <div class="space-y-4 mt-6 comments-section" id="comments-{{ $post->id }}" style="display: none;">
                    @foreach($post->comments as $comment)
                    @if(!$comment->is_hidden)
                    <div class="bg-pvn-light-beige p-4 rounded-lg">
                        <div class="flex items-center justify-between mb-2">
                            <div>
                                @if($comment->is_psychologist)
                                <span class="font-medium text-pvn-dark-green">Dr. {{ $comment->user->name }}</span>
                                <span class="ml-2 text-sm text-pvn-green">Psychologue certifié</span>
                                @else
                                <span class="font-medium text-pvn-dark-green">Anonyme</span>
                                @endif
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 report-button" data-type="comment" data-id="{{ $comment->id }}">
                                <i class="fas fa-flag"></i>
                            </button>
                        </div>
                        <p class="text-gray-700">
                            {{ $comment->content }}
                        </p>
                    </div>
                    @endif
                    @endforeach
                    
                    <!-- Comment Form -->
                    <form action="{{ route('anonymous.forum.comment', $post->id) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="flex space-x-2">
                            <input type="text" name="content" placeholder="Ajouter une réponse..." required
                                   class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pvn-green">
                            <button type="submit" class="bg-pvn-green text-white px-4 py-2 rounded-md hover:bg-pvn-dark-green">
                                Répondre
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-lg shadow-lg p-6 text-center">
                <p class="text-gray-600">Aucun message pour le moment. Soyez le premier à partager vos pensées !</p>
            </div>
            @endforelse
        </div>

        <!-- Load More Button -->
        @if($posts->hasPages())
        <div class="text-center mt-8">
            {{ $posts->links() }}
        </div>
        @endif
    </div>

    <!-- Guidelines Sidebar (Fixed) -->
    <div class="fixed right-4 top-24 w-64 bg-white rounded-lg shadow-lg p-4 hidden lg:block">
        <h3 class="text-lg font-semibold text-pvn-dark-green mb-4">Règles du forum</h3>
        <ul class="space-y-2 text-sm text-gray-600">
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Restez bienveillant et respectueux
            </li>
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Préservez votre anonymat
            </li>
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Évitez les informations personnelles
            </li>
            <li class="flex items-center">
                <i class="fas fa-check text-pvn-green mr-2"></i>
                Signalez les contenus inappropriés
            </li>
        </ul>
    </div>

    <!-- Report Modal -->
    <div id="report-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
            <h3 class="text-lg font-semibold mb-4">Signaler ce contenu</h3>
            <form id="report-form">
                @csrf
                <input type="hidden" id="reportable-type" name="reportable_type" value="">
                <input type="hidden" id="reportable-id" name="reportable_id" value="">
                
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Raison du signalement</label>
                    <select name="reason" id="report-reason" class="w-full p-2 border rounded">
                        <option value="harassment">Harcèlement</option>
                        <option value="hate_speech">Discours haineux</option>
                        <option value="inappropriate">Contenu inapproprié</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">Détails (optionnel)</label>
                    <textarea name="details" id="report-details" rows="3" class="w-full p-2 border rounded"></textarea>
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" id="cancel-report" class="px-4 py-2 bg-gray-200 rounded">Annuler</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded">Signaler</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Toggle comments
        document.querySelectorAll('.toggle-comments').forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');
                const commentsSection = document.getElementById('comments-' + postId);
                if (commentsSection) {
                    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
                }
            });
        });

        // Support button
        document.querySelectorAll('.support-button').forEach(button => {
            button.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');
                fetch(`/forum-anonyme/${postId}/support`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const countElement = this.querySelector('.support-count');
                    if (countElement) {
                        countElement.textContent = data.support_count;
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });

        // Report functionality
        const reportModal = document.getElementById('report-modal');
        const reportForm = document.getElementById('report-form');
        const reportableType = document.getElementById('reportable-type');
        const reportableId = document.getElementById('reportable-id');
        const cancelReport = document.getElementById('cancel-report');

        // Open report modal
        document.querySelectorAll('.report-button').forEach(button => {
            button.addEventListener('click', function() {
                const type = this.getAttribute('data-type');
                const id = this.getAttribute('data-id');
                
                reportableType.value = type;
                reportableId.value = id;
                reportModal.classList.remove('hidden');
            });
        });

        // Close report modal
        cancelReport.addEventListener('click', function() {
            reportModal.classList.add('hidden');
        });

        // Submit report
        reportForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(reportForm);
            
            fetch('{{ route("report.store") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    reportModal.classList.add('hidden');
                    alert(data.message);
                    reportForm.reset();
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
