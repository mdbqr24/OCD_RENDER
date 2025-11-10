@extends('layouts.app')

@section('content')
    <section class="detection-hero">
        <div class="container">
            <div class="header-content">
                <div class="header-badge">
                    <i class="fas fa-microscope"></i>
                    <span>Clinical Tool</span>
                </div>
                <h1 class="header-title">AI-powered oral cancer detection</h1>
                <p class="header-subtitle">
                    Upload an oral image for instant AI analysis. Get results in under 2 minutes with detailed confidence
                    scores and clinical recommendations.
                </p>
            </div>
        </div>
    </section>

    <div class="container">
        <h2>Test AI Analysis</h2>

        <!-- Upload Form -->
        <form id="aiForm" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" id="imageInput" required>
            <button type="submit">Upload & Predict</button>
        </form>

        <!-- Results -->
        <div id="resultsContainer" style="display:none; margin-top:20px;">
            <h3>Result: <span id="resultText"></span></h3>
            <p>Confidence that it is cancer: <span id="confidenceValue"></span>%</p>

            <!-- Display uploaded image -->
            <div style="margin-top:15px;">
                <h4>Uploaded Image:</h4>
                <img id="uploadedImage" src="" alt="Uploaded" style="max-width:100%; border:1px solid #ccc; padding:5px;">
            </div>
        </div>
    </div>

    <script>
        document.getElementById('aiForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const fileInput = document.getElementById('imageInput');
            const file = fileInput.files[0];
            if (!file) return alert('Please select an image.');

            try {
                const formData = new FormData();
                formData.append('image', file);

                const res = await fetch('{{ route("analyzeAI.image") }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                const data = await res.json();

                if (!data.success) {
                    throw new Error(data.message || 'Analysis failed.');
                }

                const result = data.data;

                // Show results
                document.getElementById('resultText').textContent = result.is_normal ? 'Non-Cancer' : 'Cancer';
                document.getElementById('confidenceValue').textContent = result.confidence;

                // Display uploaded image
                const uploadedImg = document.getElementById('uploadedImage');
                uploadedImg.src = URL.createObjectURL(file);

                document.getElementById('resultsContainer').style.display = 'block';

            } catch (err) {
                alert(err.message);
                console.error(err);
            }
        });
    </script>
@endsection
