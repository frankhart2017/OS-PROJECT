from flask import Flask, render_template, jsonify, request

from fifo import fifo_fn
from lru import lru_fn

app = Flask(__name__)

app.config['SEND_FILE_MAX_AGE_DEFAULT'] = 0
app.secret_key = 'my-secret-key'
app.config['SESSION_TYPE'] = 'filesystem'

@app.route('/', methods=['GET', 'POST'])
def index():

    return render_template("index.html")

@app.route('/fifo', methods=['GET', 'POST'])
def fifo():

    if request.method == "POST":

        try:
            frames = request.form['frames']
            reference_string = request.form['reference_string']
        except:
            data = request.get_json()
            frames = data['frames']
            reference_string = data['reference_string']

        pf, s, xs = fifo_fn(frames, reference_string)

        return jsonify({"pf": pf, "s": s, "xs": xs})

@app.route('/lru', methods=['GET', 'POST'])
def lru():

    if request.method == "POST":

        try:
            frames = request.form['frames']
            reference_string = request.form['reference_string']
        except:
            data = request.get_json()
            frames = data['frames']
            reference_string = data['reference_string']

        pf, s, xs = lru_fn(frames, reference_string)

        return jsonify({"pf": pf, "s": s, "xs": xs})
