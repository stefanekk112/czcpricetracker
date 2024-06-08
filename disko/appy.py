from flask import Flask, render_template, jsonify, request
from czcParser import Parser

app = Flask(__name__)
parser = Parser()

@app.route('/product-info', methods=['POST'])
def product_info():
    try:
        product_id = request.form.get("product_id")
        data_json = parser.parse_product(product_id)
        if data_json:
            return jsonify(data_json)
        else:
            return jsonify({"error": "No data available for this product."})
    except Exception as e:
        error_msg = "An error occurred: " + str(e)
        return jsonify({"error": error_msg})

@app.route('/')
def main():
    return render_template("main.html")

@app.route('/index')
def index():
    return render_template("index.html")

@app.route('/catalog-page')
def catalog_page():
    return render_template("catalog-page.html")

@app.route('/login')
def login():
    return render_template("login.html")

@app.route('/registration')
def registration():
    return render_template("registration.html")

if __name__ == '__main__':
    app.run(debug=True, port=3742)  # Změněný port
