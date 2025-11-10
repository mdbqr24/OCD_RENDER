from flask import Flask, request, jsonify
import tensorflow as tf
import numpy as np
from tensorflow.keras.preprocessing.image import load_img, img_to_array
import os

app = Flask(__name__)
UPLOAD_FOLDER = 'uploads'
os.makedirs(UPLOAD_FOLDER, exist_ok=True)

# Load your saved model
model = tf.keras.models.load_model("best_model_densenet.keras")

@app.route('/predict_keras_model', methods=['POST'])
def predict():
    if 'file' not in request.files:
        return jsonify({'error': 'No file uploaded'}), 400

    file = request.files['file']
    image_path = os.path.join('uploads', file.filename)
    file.save(image_path)

    # Preprocess
    image = load_img(image_path, target_size=(224, 224))
    image_array = img_to_array(image) / 255.0
    image_array = np.expand_dims(image_array, axis=0)

    # Predict
    prediction = model.predict(image_array)[0][0]
    print(prediction)
    prediction = np.abs(prediction-1)
    result = 'Cancer' if prediction > 0.7 else 'Non-Cancer'

    return jsonify({'result': result, 'confidence': float(prediction)})

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
