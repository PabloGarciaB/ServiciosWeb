using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Net;
using System.Net.Http;
using System.Net.Http.Headers;

namespace ProyectoAPIRest
{
    public partial class VentasProductos : Form
    {
        static HttpClient client = new HttpClient();
        public VentasProductos()
        {
            InitializeComponent();
        }

        private void btnSalir_Click(object sender, EventArgs e)
        {
            const string message =
        "¿Estas seguro que quieres salir de esta ventana?";
            const string caption = "Salir";
            var result = MessageBox.Show(message, caption,
                                         MessageBoxButtons.YesNo,
                                         MessageBoxIcon.Question);
            if (result == DialogResult.Yes)
            {
                Form_Login Login = new Form_Login();
                Login.ShowDialog();
            }
        }

        private void btnBuscarProducto_Click(object sender, EventArgs e)
        {
            //Consumir API get
        }

        private void btnBuscarDetalles_Click(object sender, EventArgs e)
        {
            //Consumir API get detalles
        }

        public class Producto
        {
            public int code { get; set; }
            public string message { get; set; }
            public string data { get; set; }
            public string status { get; set; }

        }

        public class Detalles
        {
            public int code { get; set; }
            public string message { get; set; }
            public string data { get; set; }
            public string status { get; set; }

        }
    }
}
