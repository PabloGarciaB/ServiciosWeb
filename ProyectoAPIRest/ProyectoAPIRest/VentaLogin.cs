using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net.Http;
using Newtonsoft.Json.Linq;

namespace ProyectoAPIRest
{

    public partial class Form_Ventas : Form

    {
        HttpClient clienteHTTP;
        public Form_Ventas()
        {
            InitializeComponent();
            // Creacion del objeto cliente de HTTP
            clienteHTTP = new HttpClient();
            // Inicialización del cliente con la URL base del servicio
            clienteHTTP.BaseAddress = new
             Uri("http://localhost/xampp/Practica8/pruebaslim/public/");
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {
        }

        private void btnAbrir_Click(object sender, EventArgs e)
        {

            RespuestaBuscarUsuario respuesta = null;

            try
            {
                var postTask = clienteHTTP.PostAsync("productos/", new MultipartFormDataContent
                {
                    { new StringContent(textBoxUser.Text), "\"user\""},
                    { new StringContent(textBoxPass.Text), "\"pass\""}
                });
                postTask.Wait();

                var result = postTask.Result;
                //Verificacion del estatus del response http
                if (result.IsSuccessStatusCode)
                {
                    var readTask = result.Content.ReadAsStringAsync();
                    readTask.Wait();
                    var json = readTask.Result;

                    // Desearlización de la respuesta JSON
                    respuesta = jsonToRespuestaBuscarUsuario(json);

                    textBoxRes.Text = "Status: " + respuesta.Status + "\r\n";
                    VentasProductos Form = new VentasProductos();
                    Form.ShowDialog();
                }
                else
                {
                    //Se muestra mensaje de error a la respuesta
                    textBoxRes.Text = result.StatusCode + " - " + result.RequestMessage;
                }
            }
            catch (HttpRequestException error)
            {
                textBoxRes.Text = error.Message;
            }
        }

        internal class RespuestaBuscarUsuario
        {
            private string code;
            private string message;
            private string status;

            public string Code { get => code; set => code = value; }
            public string Message { get => message; set => message = value; }
            public string Status { get => status; set => status = value; }
        }

        private RespuestaBuscarUsuario jsonToRespuestaBuscarUsuario(string json)
        {
            RespuestaBuscarUsuario res = new RespuestaBuscarUsuario();
            JObject jObject = JObject.Parse(json);
            JToken jUser = jObject;
            res.Code = (string)jUser["code"];
            res.Message = (string)jUser["message"];
            res.Status = (string)jUser["status"];
            return res;

        }
    }
}
